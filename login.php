<?php
// login.php
session_start();
require 'db.php'; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Successful login
            $_SESSION['username'] = $username;
            header("Location: welcome.php");
            exit();
        } else {
            // Invalid password
            $_SESSION['error'] = "Invalid password.";
        }
    } else {
        // No user found
        $_SESSION['error'] = "No user found with that username.";
    }

    $stmt->close();
}

$conn->close();
header("Location: index.php"); // Redirect back to the login form
exit();
?>