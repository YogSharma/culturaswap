<?php
// Check if the user is logged in
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('Login first to comment.'); window.location='viewblog.php';</script>";
    exit();
}

// Check if the required parameters are provided
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['blogid']) && isset($_POST['comment'])) {
    // Sanitize inputs
    $blogId = filter_var($_POST['blogid'], FILTER_SANITIZE_NUMBER_INT);
    $commentText = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);

    // Your database connection code
    include("connection.php");

    // Get userid based on the email from the session
    $username = $_SESSION['username'];
    $getUserQuery = "SELECT userid FROM user WHERE email = '$username'";
    $getUserResult = mysqli_query($conn, $getUserQuery);

    if ($getUserResult) {
        $row = mysqli_fetch_array($getUserResult);
        $userId = $row['userid'];

        // Insert the comment into the database
        $insertCommentQuery = "INSERT INTO comment (blogid, userid, comment) VALUES ('$blogId', '$userId', '$commentText')";
        $insertCommentResult = mysqli_query($conn, $insertCommentQuery);

        if ($insertCommentResult) {
            echo "<script>alert('Comment added successfully.'); window.location='viewblog.php';</script>";
            exit();
        } else {
            echo "<script>alert('Error adding comment. Please try again later.'); window.location='viewblog.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('User not found.'); window.location='viewblog.php';</script>";
        exit();
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "<script>alert('Invalid request.'); window.location='viewblog.php';</script>";
    exit();
}
?>
