<?php
ini_set('display_errors', '0');
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start(); // Start the session

// Initialize error message
$error_message = "";
$reset_message = ""; // Message for password reset requests

// ——————————————
// LOGIN PROCESS
// ——————————————
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'cbc');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get & sanitize inputs
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username === "" || $password === "") {
        $error_message = "Username and password are required.";
    } else {
        // Force lowercase for case-insensitive lookup
        $username_lc = strtolower($username);

        $sql = "SELECT *
                  FROM users
                 WHERE LOWER(username) = ?
                 LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username_lc);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Success!
                $_SESSION['username'] = $user['username'];
                $_SESSION['loggedin'] = true;
                $_SESSION['login_attempts'] = 0;
                header("Location: index.php");
                exit;
            } else {
                if (!isset($_SESSION['login_attempts'])) {
                    $_SESSION['login_attempts'] = 1;
                } else {
                    $_SESSION['login_attempts']++;
                }
                $error_message = "Invalid username or password.";
            }
        } else {
            if (!isset($_SESSION['login_attempts'])) {
                $_SESSION['login_attempts'] = 1;
            } else {
                $_SESSION['login_attempts']++;
            }
            $error_message = "Invalid username or password.";
        }

        $stmt->close();
        $conn->close();
    }
}

// ——————————————
// FORGOT PASSWORD PROCESS (Handling the form submission from the modal)
// ——————————————
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['forgot_password_submit'])) {
    $conn = new mysqli('localhost', 'root', '', 'cbc');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $reset_email = trim($_POST['reset_email']);

    if (empty($reset_email)) {
        $reset_message = '<div class="alert alert-danger">Please enter your email address.</div>';
    } else {
        $reset_email_lc = strtolower($reset_email);
        $sql = "SELECT * FROM users WHERE LOWER(email) = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $reset_email_lc);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            $user = $result->fetch_assoc();
            $token = bin2hex(random_bytes(32)); // Generate a unique token
            $expiry = date("Y-m-d H:i:s", time() + (60 * 60)); // Token expires in 1 hour

            $update_sql = "UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE id = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("ssi", $token, $expiry, $user['id']);
            if ($update_stmt->execute()) {
                // Send email with the reset link (you'll need to configure your email sending)
                $reset_link = "reset-password.php?token=" . $token;
                $email_message = "Please click the following link to reset your password: " . $reset_link;
                // In a real application, you would use a proper email library to send this.
                // For now, we'll just display a success message.
                $reset_message = '<div class="alert alert-success">A password reset link has been sent to your email address.</div>';
            } else {
                $reset_message = '<div class="alert alert-danger">Error updating reset token. Please try again.</div>';
            }
            $update_stmt->close();
        } else {
            $reset_message = '<div class="alert alert-warning">No user found with that email address.</div>';
        }
        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login - E-Learning Books</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            font-family: Arial, sans-serif;
        }

        .back-button {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .login-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 90%;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #343a40;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 20px;
            padding: 12px;
            border-radius: 4px;
            border: 1px solid #ced4da;
        }

        .btn-primary {
            width: 100%;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 15px;
        }

        .forgot-password-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 0.9rem;
            cursor: pointer; /* Indicate it's clickable */
            color: #007bff; /* Bootstrap primary color */
            text-decoration: none;
        }

        .forgot-password-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <button class="btn btn-secondary back-button" onclick="window.location.href='landin.php'">Back</button>

    <div class="login-container">
        <h2>Login to CBC E-Learning</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button class="btn btn-primary" type="submit" name="login">Login</button>

            <?php if (!empty($error_message)): ?>
                <div class="error-message mt-3"><?php echo $error_message; ?></div>
            <?php endif; ?>
        </form>

        <p class="forgot-password-link" data-toggle="modal" data-target="#forgotPasswordModal">Forgot Password?</p>
        <p class="text-center mt-3">Don't have an account? <a href="registration.php">Register here</a></p>
    </div>

    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Your Password?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo $reset_message; ?>
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="reset_email">Enter your email address:</label>
                            <input type="email" class="form-control" id="reset_email" name="reset_email" placeholder="Your email@example.com" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="forgot_password_submit">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>