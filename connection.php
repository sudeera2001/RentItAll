<?php
// Database configuration
$host = "DA PMA SignOn:3306";       // Hostname (e.g., localhost or IP address)
$username = "rentital_root";        // Database username
$password = "rentitall@123456";            // Database password
$database = "rentital_rentitall"; // Database name

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
