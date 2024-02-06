<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    $confirm_password = mysqli_real_escape_string($conn, $confirm_password);

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match. Please try again.'); window.location='register.php';</script>";
        exit();
    }

    $query = "INSERT INTO user (username, email, password,cpassword) VALUES ('$username', '$email', '$password','$confirm_password')";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Registration successful!Please login to access.'); window.location='login.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error registering user. Please try again.'); window.location='register.php';</script>";
        exit();
    }
} else {
    header("Location: register.php");
    exit();
}

$conn->close();
?>
