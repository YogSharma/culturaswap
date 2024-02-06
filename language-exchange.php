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
                        <h2 >"Language Exchange: Learn, Connect, and Share."</h2>
                        <span>Explore language diversity and connect with people from around the world!</span>
                    </div>
                </div>
            </div>
            <hr>

            <style>
                /* Internal CSS styles */
                .language-panel {
                    padding: 20px;
                    margin-bottom: 20px;
                   
                }

                .language-entry {
                    margin-bottom: 20px;
                    padding: 15px;
                    border-radius: 5px;
                    background-color: #f9f9f9;
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
                <div class="col-md-7 animate-box language-panel existing-entries"style="width: 70%;">
                    <h2 class="text-center">Language Exchange</h2>
                    <?php
                    // Your database connection code
                    include("connection.php");

                    // Fetch language exchange entries and associated user information from the database
                    $query = "SELECT langexchange.*, user.username
                              FROM langexchange
                              LEFT JOIN user ON langexchange.userid = user.userid";
                    $result = mysqli_query($conn, $query);

                    if ($result === false) {
                        die('Error fetching language exchange entries: ' . mysqli_error($conn));
                    }

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $leid = $row['leid'];
                    ?>
                            <div class="language-entry">
                                <h3><?php echo $row['title']; ?></h3>
                                <p><?php echo nl2br($row['description']); ?></p>
                                <span>Posted by: <?php echo isset($row['username']) ? $row['username'] : 'Anonymous'; ?></span>
                                <div class="comment-section">
                                    <h4>Comments:</h4>
                                    <?php
                                    // Fetch and display comments for the language exchange entry
                                    $commentQuery = "SELECT comment.*, user.username
                                                    FROM comment
                                                    LEFT JOIN user ON comment.userid = user.userid
                                                    WHERE comment.leid = $leid";
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
                                    <form action="insertlanguageexchangecomment.php" method="post">
                                        <input type="hidden" name="leid" value="<?php echo $leid; ?>">
                                        <label for="comment">Add Comment:</label>
                                        <textarea name="comment" rows="2" required></textarea>
                                        <button type="submit">Submit Comment</button>
                                    </form>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo '<p>No language exchange entries available.</p>';
                    }

                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                </div>

                <!-- Add Entry Panel -->
                <div class="col-md-5 text-center animate-box language-panel add-entry"style="width: 30%;">
                    <h2>Add Your Own Language Exchange</h2>
                    <!-- Form to add new language exchange entry -->
                    <form action="insertlanguageexchange.php" method="post">
                        <label for="title">Title:</label>
                        <input type="text" name="title" required>

                        <label for="description">Description:</label>
                        <textarea name="description" rows="4" required></textarea>

                        <button type="submit">Submit Language Exchange</button>
                    </form>
                </div>
            </div>

            <?php include("footer.php"); ?>
        </div>
    </div>
</body>

</html>
