<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php?error=login_required");
    exit();
}

include("connection.php");

// Retrieve user ID based on the logged-in username
$username = $_SESSION['username'];
$queryUserId = "SELECT userid FROM user WHERE email = ?";
$stmtUserId = mysqli_prepare($conn, $queryUserId);
mysqli_stmt_bind_param($stmtUserId, "s", $username);
mysqli_stmt_execute($stmtUserId);
$resultUserId = mysqli_stmt_get_result($stmtUserId);

// If query fails, display an alert and exit
if (!$resultUserId) {
    exitWithError("Error fetching user ID: " . mysqli_error($conn));
}

// Fetch the user ID directly from the result set
$user = mysqli_fetch_assoc($resultUserId);

// If user not found, display an alert and exit
if (!$user) {
    exitWithError("Error: User not found.");
}

$userID = $user['userid'];

// Check if the form is submitted using POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Insert a new blog post into the database
    $query = "INSERT INTO blog (userid, title, description) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "iss", $userID, $title, $description);

    // If the blog post is added successfully, redirect to the index page
    if (mysqli_stmt_execute($stmt)) {
        exitWithSuccess("Blog post added successfully.");
    } else {
        // If an error occurs, display an alert with a generic message
        exitWithError("Error adding blog post. Please try again later.");
    }
} else {
    // If the form is not submitted via POST, redirect to the addblog.php page
    header("Location: addblog.php");
    exit();
}

function exitWithError($errorMessage) {
    echo "<script>alert('$errorMessage'); window.location='index.php';</script>";
    exit();
}

function exitWithSuccess($successMessage) {
    echo "<script>alert('$successMessage'); window.location='addblog.php';</script>";
    exit();
}
?>
