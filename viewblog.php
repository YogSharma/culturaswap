<!DOCTYPE HTML>
<html>
<?php include("head.php"); ?>
<style>
    <!-- Existing styles remain unchanged -->

    <!-- Additional CSS for View Blog Page -->
    #fh5co-view-blog {
        padding: 50px 0;
    }

    .blog-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        grid-gap: 20px;
    }

    .blog-card {
        margin-bottom: 30px;
    }

    .comment-section {
        margin-top: 20px;
    }

    .comment-form {
        margin-top: 20px;
    }

    .comment-form label {
        display: block;
        margin-bottom: 10px;
    }

    .comment-form textarea {
        width: 100%;
        height: 100px;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .comment-form button {
        background-color: #3498db;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .comment-form button:hover {
        background-color: #2980b9;
    }
</style>

<body>
    <div class="fh5co-loader"></div>
    <div id="page">
        <?php include('navbar.php'); ?>
        <div class="container-wrap">
            <!-- View Blog Page -->
            <div id="fh5co-view-blog">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                        <h1>Explore Our Blogs</h1>
                        <p>Discover insightful articles from our community members.</p>
                    </div>
                </div>
                <div class="blog-container">
                    <?php
                    // Your database connection code
                    include("connection.php");

                    // Fetch blog entries and associated user information from the database
                    $query = "SELECT blog.*, user.username
                              FROM blog
                              JOIN user ON blog.userid = user.userid";
                    $result = mysqli_query($conn, $query);

                    if ($result === false) {
                        die('Error fetching blogs: ' . mysqli_error($conn));
                    }

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $blogId = $row['blogid'];
                            ?>
                            <div class="col-md-12 blog-card" style="widht:50%;border:1px solid #D3D3D3;padding:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['title']; ?></h5>
                                        <p class="card-text"><?php echo nl2br($row['description']);?></p>
                                        <p class="card-text">Date: <?php echo $row['date']; ?></p>
                                        <p class="card-text">Author: <?php echo $row['username']; ?></p>

                                        <!-- Comment Section for the Blog -->
                                        <div class="comment-section">
                                            <h3>Comments</h3>
                                            <?php
                                            // Fetch and display comments for the blog
                                            $commentQuery = "SELECT comment.*, user.username
                                                            FROM comment
                                                            JOIN user ON comment.userid = user.userid
                                                            WHERE comment.blogid = $blogId";
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
                                        </div>

                                        <!-- Comment Form for the Blog -->
                                        <div class="comment-form">
                                            <h3>Add a Comment</h3>
                                            <form action="insertblogcomment.php" method="post">
                                                <input type="hidden" name="blogid" value="<?php echo $blogId; ?>">
                                                <label for="comment">Your Comment:</label>
                                                <textarea id="comment" name="comment" required></textarea>
                                                <button type="submit">Submit Comment</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo '<p>No blogs available.</p>';
                    }

                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>
</body>

</html>
