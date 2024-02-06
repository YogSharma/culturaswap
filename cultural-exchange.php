<!DOCTYPE HTML>
<html lang="en">
<?php include("head.php"); ?>

<body>

    <div class="fh5co-loader"></div>

    <div id="page">
        <?php include('navbar.php'); ?>
        <div class="container-wrap">
            <div id="fh5co-intro">
                <div class="row animate-box">
                    <div class="col-md-12 col-md-offset-0 text-center">
                        <h2>"Cultural Exchange: Celebrate Diversity, Connect Globally."</h2>
                        <span>Share your cultural experiences and discover the richness of global diversity!</span>
                    </div>
                </div>
            </div>
            <hr>

            <style>
                /* Internal CSS styles */
                .cultural-panel {
                    padding: 20px;
                    margin-bottom: 20px;
                }

                .cultural-entry {
                    margin-bottom: 20px;
                    background-color: #f9f9f9;
                    padding: 15px;
                    border-radius: 5px;
                }

                .comment-section {
                    margin-top: 15px;
                }

                .comment {
                    background-color: #fff;
                    padding: 10px;
                    margin-bottom: 10px;
                    border: 1px solid #eee;
                    border-radius: 5px;
                }

                label {
                    display: block;
                    margin-top: 10px;
                    font-weight: bold;
                }

                input,
                textarea {
                    width: 100%;
                    padding: 8px;
                    margin-top: 5px;
                    margin-bottom: 10px;
                    box-sizing: border-box;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                }

                button {
                    background-color: #4CAF50;
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }

                button:hover {
                    background-color: #45a049;
                }
            </style>

            <div class="row">
                <!-- Existing Entries Panel -->
                <div class="col-md-6  animate-box cultural-panel existing-entries" style="width: 70%;">
                    <h2 class="text-center">Cultural Exchange</h2>
                    <?php
                    include("connection.php");

                    $query = "SELECT culturaexchange.*, user.username
                              FROM culturaexchange
                              LEFT JOIN user ON culturaexchange.userid = user.userid";
                    $result = mysqli_query($conn, $query);

                    if ($result === false) {
                        die('Error fetching cultural exchange entries: ' . mysqli_error($conn));
                    }

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $ceid = $row['ceid'];
                    ?>
                            <div class="cultural-entry">
                                <h3><?php echo $row['title']; ?></h3>
                               
                                <p><?php echo  nl2br($row['description']); ?></p>
                                <span>Posted by: <?php echo isset($row['username']) ? $row['username'] : 'Anonymous'; ?></span>
                                <div class="comment-section">
                                    <h4>Comments:</h4>
                                    <?php
                                    // Fetch and display comments for the cultural exchange entry
                                    $commentQuery = "SELECT comment.*, user.username
                                                    FROM comment
                                                    LEFT JOIN user ON comment.userid = user.userid
                                                    WHERE comment.ceid = $ceid";
                                    $commentResult = mysqli_query($conn, $commentQuery);

                                    if ($commentResult === false) {
                                        die('Error fetching comments: ' . mysqli_error($conn));
                                    }

                                    if (mysqli_num_rows($commentResult) > 0) {
                                        while ($comment = mysqli_fetch_assoc($commentResult)) {
                                    ?>
                                            <div class="comment">
                                                <p><strong><?php echo isset($comment['username']) ? $comment['username'] : 'Unknown'; ?>:</strong> <?php echo isset($comment['comment']) ? $comment['comment'] : 'No comment text'; ?></p>
                                            </div>
                                        <?php
                                        }
                                    } else {
                                        echo '<p>No comments yet.</p>';
                                    }
                                    ?>
                                    <form action="insertculturalexchangecomment.php" method="post">
                                        <input type="hidden" name="ceid" value="<?php echo $ceid; ?>">
                                        <label for="comment">Add Comment:</label>
                                        <textarea name="comment" rows="2" required></textarea>
                                        <button type="submit">Submit Comment</button>
                                    </form>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo '<p>No cultural exchange entries available.</p>';
                    }

                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                </div>

                <!-- Add Entry Panel -->
                <div class="col-md-6 text-center animate-box cultural-panel add-entry" style="width: 30%;">
                    <h2>Add Your Own Cultural Exchange</h2>
                    <!-- Form to add new cultural exchange entry -->
                    <form action="insertculturalexchange.php" method="post">
                        <label for="title">Title:</label>
                        <input type="text" name="title" required>

                        <label for="description">Description:</label>
                        <textarea name="description" rows="4" required></textarea>

                        <button type="submit">Submit Cultural Exchange</button>
                    </form>
                </div>
            </div>

            <!-- Additional sections (counters, services, member experiences, etc.) remain unchanged -->
            <?php include("footer.php"); ?>
        </div>
    </div>
</body>

</html>
