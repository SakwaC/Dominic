<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="reg_css.css">
    <style>
        /* Custom styling for the back button */
        .back-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: black;
            color: white;
            padding: 5px 15px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .back-btn:hover {
            background-color: #333;
        }

        /* Increased container size */
        .container {
            max-width: 600px; 
            margin-top: 100px; 
        }

        /* Form input field styling */
        .form-control {
            font-size: 1rem; 
        }

        /* Align labels to the left */
        .form-label {
            text-align: left;
            display: block;
            font-weight: bold; 
        }

        /* Styling for error messages */
        .alert-danger {
            text-align: center;
        }
    </style>
</head>
<body class="bg-light">

    <a href="landin.php" class="back-btn">Back</a>

    <div class="container mt-5 p-4 border rounded shadow-lg bg-white">
        <h2 class="text-center text-primary mb-4">Create Account</h2>

        <?php
        if (isset($_SESSION['success_message'])) {
            echo '<div class="alert alert-success text-center" role="alert">'
                . $_SESSION['success_message'] .
                '</div>';

            unset($_SESSION['success_message']); // Clear the message

            // Redirect after 3 seconds
            echo '<script>
                    setTimeout(function() {
                        window.location.href = "login.php";
                    }, 3000); // 3 seconds
                  </script>';
        }

        if (isset($_SESSION['error_message'])) {
            echo '<div class="alert alert-danger" role="alert">'
                . $_SESSION['error_message'] .
                '</div>';
            unset($_SESSION['error_message']); // Clear the error message
        }
        ?>

        <form action="reg-back.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>

        <p class="text-center mt-3">Already have an account? <a href="login.php">Log in</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>