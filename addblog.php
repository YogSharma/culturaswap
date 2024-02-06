<!DOCTYPE HTML>
<html lang="en">

<?php include("head.php"); ?>

<style>
    /* Your existing styles here */

    /* Additional CSS for Add Blog Page */
    #fh5co-add-blog {
        padding: 50px 0;
    }

    .form-container {
        max-width: 600px;
        margin: 0 auto; /* Center the form horizontally */
        background: #fff;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .form-container label {
        display: block;
        margin-bottom: 10px;
    }

    .form-container input,
    .form-container textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .form-container textarea {
        height: 150px;
    }

    .form-container button {
        background-color: #45a049;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .form-container button:hover {
        background-color: #2980b9;
    }

    #loadingSpinner {
        display: none;
    }
</style>

<body>

    <div class="fh5co-loader"></div>

    <div id="page">
        <?php include('navbar.php'); ?>
        <div class="container-wrap">

            <!-- Add Blog Page -->
            <div id="fh5co-add-blog">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                        <h2>Add a New Blog Post</h2>
                        <p>Share your insights, stories, and cultural discoveries with our community.</p>
                    </div>
                </div>
                <div class="row" style="margin-left: 25%">
                    <div class="col-md-8 col-md-offset-2 text-center form-container">
                        <!-- Form to Add a New Blog Post -->
                        <form id="addBlogForm" action="insertblog.php" method="post">
                            <label for="title">Title:</label>
                            <input type="text" id="title" name="title" required>

                            <label for="description">Description:</label>
                            <textarea id="description" name="description" required></textarea>

                            <button type="submit" id="submitBtn">Add Blog Post</button>
                            <div id="loadingSpinner">Loading...</div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <?php include("footer.php"); ?>

        <script>
            // Display loading spinner on form submission
            document.getElementById('addBlogForm').addEventListener('submit', function () {
                document.getElementById('submitBtn').style.display = 'none';
                document.getElementById('loadingSpinner').style.display = 'block';
            });
        </script>

    </body>
</html>
