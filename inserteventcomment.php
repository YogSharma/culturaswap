<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Login first to comment.'); window.location='event.php';</script>";
    exit();
}

// Your database connection code
include("connection.php");

// Fetch user ID based on the email from the session
$email = $_SESSION['username'];
$userQuery = "SELECT userid FROM user WHERE email = ?";
$userStmt = mysqli_prepare($conn, $userQuery);

if ($userStmt) {
    mysqli_stmt_bind_param($userStmt, 's', $email);
    mysqli_stmt_execute($userStmt);
    mysqli_stmt_bind_result($userStmt, $userId);

    // Check if the user exists
    if (mysqli_stmt_fetch($userStmt)) {
        mysqli_stmt_close($userStmt);

        // Check if the required parameters are provided
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eventid']) && isset($_POST['comment'])) {
            // Sanitize inputs
            $eventId = filter_var($_POST['eventid'], FILTER_SANITIZE_NUMBER_INT);
            $commentText = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);

            // Insert the comment into the database
            $commentQuery = "INSERT INTO comment (eventid, userid, comment) VALUES (?, ?, ?)";
            $commentStmt = mysqli_prepare($conn, $commentQuery);

            if ($commentStmt) {
                mysqli_stmt_bind_param($commentStmt, 'iss', $eventId, $userId, $commentText);

                if (mysqli_stmt_execute($commentStmt)) {
                    echo "<script>alert('Comment added successfully.'); window.location='events.php';</script>";
                    exit();
                } else {
                    echo "<script>alert('Error adding comment. Please try again later.'); window.location='events.php';</script>";
                    exit();
                }
            } else {
                echo "<script>alert('Error preparing statement.'); window.location='events.php';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Invalid request.'); window.location='events.php';</script>";
            exit();
        }
    } else {
        mysqli_stmt_close($userStmt);
        echo "<script>alert('User not found.'); window.location='events.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Error preparing statement.'); window.location='events.php';</script>";
    exit();
}
?>
