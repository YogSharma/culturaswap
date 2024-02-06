<?php
// Include your database connection code (e.g., connection.php)
include("connection.php");

// Start or resume the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    die('Session not available. Please log in.');
}

// Get user information
$sessionUsername = $_SESSION['username'];
$userQuery = "SELECT userid FROM user WHERE email = '$sessionUsername'";
$userResult = mysqli_query($conn, $userQuery);

if ($userResult === false) {
    die('Error fetching user information: ' . mysqli_error($conn));
}

$userRow = mysqli_fetch_assoc($userResult);
$userid = $userRow['userid'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $ceid = mysqli_real_escape_string($conn, $_POST["ceid"]);
    $comment = mysqli_real_escape_string($conn, $_POST["comment"]);

    // Insert the comment into the database
    $insertCommentQuery = "INSERT INTO comment (ceid, userid, comment, date) 
                           VALUES ('$ceid', '$userid', '$comment', NOW())";

    if (mysqli_query($conn, $insertCommentQuery)) {
        // Comment added successfully
        header("Location: cultural-exchange.php"); // Redirect to the cultural exchange page
        exit();
    } else {
        // Error handling: Redirect or display an error message as needed
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
