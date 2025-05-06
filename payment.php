<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];

    // Validate phone number  and payment logic (basic validation)
    header("Location: premium_content.html");
    exit();
} else {
    // If accessed directly, redirect back to the main page
    header("Location: index-pr.html");
    exit();
}
?>
