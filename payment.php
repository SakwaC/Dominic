<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];

    // Here you would integrate your payment processing logic using the phone number.
    // For example, using an API for mobile payments like M-Pesa, PayPal, or others.

    // After successful payment, redirect to a page with the premium content
    // Replace 'premium_content.html' with the actual file or resource you want to provide.
    header("Location: premium_content.html");
    exit();
} else {
    // If accessed directly, redirect back to the main page
    header("Location: index-pr.html");
    exit();
}
?>
