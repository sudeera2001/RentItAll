<?php
// Database configuration
$host = "127.0.0.1";       // Hostname (e.g., localhost or IP address)
$username = "root";        // Database username
$password = "";            // Database password
$database = "rentitall"; // Database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "";
}

// Close the connection (optional in persistent scripts)
// $conn->close();
?>
