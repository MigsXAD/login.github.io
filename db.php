<?php
// db.php
$servername = "localhost";
$username = "root"; // Your database username
$password = "root"; // Your database password
$dbname = "user_auth";
$port = 3307; // Your MySQL port

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>