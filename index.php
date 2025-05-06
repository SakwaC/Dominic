<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
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
        <div class="logout-btn">
        <a href="landin.php">Log Out</a>
      </div>
    </header>

    <!-- Available Books Section -->
    <section id="resources">
        <h2>Available Materials</h2>
        <div class="books-grid">
            <a href="uploads/budget.drawio.pdf">Book 1</a>
            <a href="book2.html">Book 2</a>
            <a href="book3.html">Book 3</a>
            <a href="book4.html">Book 4</a>
            <a href="book5.html">Book 5</a>
            <a href="book6.html">Book 6</a>
            <a href="book7.html">Book 7</a>
            <a href="book8.html">Book 8</a>
            <a href="book9.html">Book 9</a>
            <a href="book10.html">Book 10</a>
            <a href="book11.html">Book 11</a>
            <a href="book12.html">Book 12</a>
            <a href="book13.html">Book 13</a>
            <a href="book14.html">Book 14</a>
        </div>
    </section>

    <!-- Payment Section for Premium Content -->
    <section id="payment">
        <h2>Access Premium Content</h2>
        <div class="pricing-info">
            <p>Choose your subscription plan:</p>
            <ul>
                <li><strong>ONE WEEK:</strong> KSH 200</li>
                <li><strong>ONE MONTH:</strong> KSH 400</li>
                <li><strong>ONE YEAR:</strong> KSH 2000</li>
            </ul>
        </div>

        <div class="till-info">
            <p><strong>TILL NUMBER:</strong></p>
            <div class="till-number">4955238</div>
        </div>

        <form action="payment.php" method="POST">
            <button type="submit">Pay and Access</button>
        </form>
    </section>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Latest E-Learning Resources</p>
    </footer>
</body>
</html>