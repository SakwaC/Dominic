<?php
session_start(); // Needed to store flash messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to database
    $conn = new mysqli('localhost', 'root', '', 'cbc');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Gather + sanitize inputs
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    // Basic validation
    if ($username === '' || $email === '' || $password === '') {
        $_SESSION['error_message'] = "All fields are required.";
        header("Location: registration.php");
        exit();
    }

    // Duplicate check (case-insensitive)
    $lc_user  = strtolower($username);
    $lc_email = strtolower($email);
    $dupSql = "
      SELECT 1
        FROM users
       WHERE LOWER(username) = ?
          OR LOWER(email)    = ?
       LIMIT 1
    ";
    $dup = $conn->prepare($dupSql);
    $dup->bind_param("ss", $lc_user, $lc_email);
    $dup->execute();
    $dup->store_result();

    if ($dup->num_rows > 0) {
        $_SESSION['error_message'] = "Username or email already registered.";
        $dup->close();
        $conn->close();
        header("Location: registration.php");
        exit();
    }
    $dup->close();

    // Hash password and insert new user
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Registration successful! ";
    } else {
        $_SESSION['error_message'] = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: registration.php");
    exit();
}
?>