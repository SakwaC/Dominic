<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start(); // Start the session

// Track login attempts
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

$error_message = ""; // Initialize error message
$max_attempts = 3; // Max failed attempts before showing "forgot password" option

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Database connection
    $conn = new mysqli('localhost', 'username', 'password', 'cbc');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get input values
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // SQL to check the credentials
    $sql = "SELECT * FROM register WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Credentials are correct, create a session
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
            $_SESSION['login_attempts'] = 0; // Reset login attempts after successful login

            // Redirect to the index page
            header("Location: index.php");
            exit;
        } else {
            // Password is incorrect, increment login attempts
            $_SESSION['login_attempts']++;
            $error_message = "Invalid username or password.";
        }
    } else {
        // Username doesn't exist
        $_SESSION['login_attempts']++;
        $error_message = "Invalid username or password.";
    }

    // Close connections
    $stmt->close();
    $conn->close();
}

// Handle the password reset form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reset_password'])) {
    // Database connection
    $conn = new mysqli('localhost', 'username', 'password', 'cbc');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = htmlspecialchars($_POST['username']);
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

    // SQL to update the password
    $sql = "UPDATE register SET password = ? WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $new_password, $username);
    
    if ($stmt->execute()) {
        $error_message = "Password reset successfully.";
        $_SESSION['login_attempts'] = 0; // Reset login attempts
    } else {
        $error_message = "Error resetting password.";
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Learning Books</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-button, .reset-button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .login-button:hover, .reset-button:hover {
            background-color: #218838;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login to CBC E-Learning</h2>
        <form method="POST" action="">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button class="login-button" type="submit" name="login">Login</button>
            <?php if (!empty($error_message)): ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>
        </form>

        <!-- Show reset password option if max attempts are reached -->
        <?php if ($_SESSION['login_attempts'] >= $max_attempts): ?>
            <h3>Forgot your password?</h3>
            <form method="POST" action="">
                <div class="input-group">
                    <label for="new_password">New Password</label>
                    <input type="password" id="new_password" name="new_password" placeholder="Enter your new password" required>
                </div>
                <button class="reset-button" type="submit" name="reset_password">Reset Password</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>

