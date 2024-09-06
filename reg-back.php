<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    
    $conn = new mysqli('localhost', 'username', 'password', 'cbc');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get input values
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL to insert new record
    $sql = "INSERT INTO register (username, email, password) VALUES (?, ?, ?)";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
