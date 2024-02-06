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
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    // Insert the cultural exchange entry into the database
    $insertQuery = "INSERT INTO culturaexchange (title, description, date, userid) 
                    VALUES ('$title', '$description', NOW(), '$userid')";

    if (mysqli_query($conn, $insertQuery)) {
        // Entry added successfully
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
