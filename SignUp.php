<?php
// Database connection
$con = mysqli_connect('localhost', 'new', '', 'rentitall');
if (!$con) {
    die('Connection Failed: ' . mysqli_error($con));
}

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize user inputs
    $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : null;
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : null;
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null;
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : null;

    // Check required fields
    if (empty($username) || empty($password) || empty($email)) {
        die('Error: Username, Password, and Email are required fields.');
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL statement
    $stmt = $con->prepare("INSERT INTO account (Username, Password, Email, Phone) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die('Statement Preparation Failed: ' . mysqli_error($con));
    }

    // Bind parameters and execute the query
    $stmt->bind_param("ssss", $username, $hashedPassword, $email, $phone);
    if ($stmt->execute()) {
        echo "Registration Successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $con->close();
} else {
    echo "Invalid Request.";
}
?>
