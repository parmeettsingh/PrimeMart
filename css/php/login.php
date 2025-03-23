<?php
// login_process.php

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Database connection (replace with your actual database)
$conn = new mysqli('localhost', 'username', 'password', 'database');

// Check if the user exists
$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // User found, log in
    session_start();
    $_SESSION['user'] = $email;
    header("Location: dashboard.php");
} else {
    // Invalid login
    echo "Invalid email or password.";
}

$conn->close();
?>
