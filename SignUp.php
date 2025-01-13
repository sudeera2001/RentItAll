<?php
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $conn = new mysqli('localhost','new','','rentitall');
    if($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("Instert into account(Username, Password, email, Phone number)
        values(?,?,?,?) ");
        $stmt->bind_param("sssi", $username, $password, $email, $phone);  
        $stmt->execute();
        echo"Registration Sucessful....";
        $stmt->close();
        $conn->close();
    }
?>