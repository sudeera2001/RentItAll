<?php
// Database configuration
$host = "localhost";       // Hostname (e.g., localhost or IP address)
$username = "root";        // Database username
$password = "";            // Database password
$database = "your_database"; // Database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully!";
}

// Close the connection (optional in persistent scripts)
// $conn->close();
?>
