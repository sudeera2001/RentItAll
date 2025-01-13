<?php
// Database configuration
$host = "cloud3.googiehost.com";       // Hostname (e.g., localhost or IP address)
$username = "rentital_root";        // Database username
$password = "rentitall@123456";            // Database password
$database = "rentital_rentitall"; // Database name

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
