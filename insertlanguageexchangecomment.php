<?php
include("connection.php");

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

// Get data from the form
$leid = mysqli_real_escape_string($conn, $_POST['leid']);
$comment = mysqli_real_escape_string($conn, $_POST['comment']);

// Insert comment into the database
$insertCommentQuery = "INSERT INTO comment (leid, userid, comment, date) VALUES ($leid, $userid, '$comment', NOW())";
$result = mysqli_query($conn, $insertCommentQuery);

if ($result === false) {
    die('Error inserting comment: ' . mysqli_error($conn));
}

// Close the database connection
mysqli_close($conn);

// Redirect back to the language exchange page
header("Location: language-exchange.php");
exit();
?>
