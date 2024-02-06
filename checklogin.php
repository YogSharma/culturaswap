<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM user WHERE email='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['username'] = $username;
        echo "<script>
                alert('Login successful');
                window.location='index.php';
            </script>";
    } else {
        echo "<script>
                alert('Invalid username or password. Please try again.');
                window.location='login.php';
            </script>";
    }
} else {
    header("Location: login.php");
}

$conn->close();
?>
