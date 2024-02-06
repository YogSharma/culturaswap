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
$title = mysqli_real_escape_string($conn, $_POST['title']);
$description = mysqli_real_escape_string($conn, $_POST['description']);

// Insert language exchange entry into the database
$insertQuery = "INSERT INTO langexchange (title, description, date, userid) VALUES ('$title', '$description', NOW(), $userid)";
$result = mysqli_query($conn, $insertQuery);

if ($result === false) {
    die('Error inserting language exchange entry: ' . mysqli_error($conn));
}

// Close the database connection
mysqli_close($conn);

// Redirect to the language exchange page
header("Location: language-exchange.php");
exit();
?>
