<?php
session_start(); // Start the session

// Debugging: Check session variables
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {git
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning Resources</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>WELCOME TO CBC LEARNING CENTRE</h1>
    </header>

    <section id="resources">
        <h2>Available Books</h2>
        <ul>
            <li><a href="book1.html">Book 1</a></li>
            <li><a href="book2.html">Book 2</a></li>
            <li><a href="book3.html">Book 3</a></li>
        </ul>
    </section>

    <section id="payment">
        <h2>Access Premium Content</h2>
        <h2>ONE WEEK-KSH 200,ONE MONTH-KSH 400,ONE YEAR-KSH2000</h2>
        <form action="payment.php" method="POST">
            <label for="phone">Enter your phone number:</label>
            <input type="text" id="phone" name="phone" required>
            <button type="submit">Pay and Access</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 latest E-Learning Resources</p>
    </footer>
</body>
</html>
