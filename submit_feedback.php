
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli('localhost', 'username', 'password', 'cbc');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // POST form data
    $name = $_POST['name'];
    $contact =$_POST['contact'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    // Prepare and bind
    
    $stmt = $conn->prepare("INSERT INTO feedback (name, contact, email, feedback) VALUES (?, ?, ?, ?)");

    //$stmt->bind_param("ssss", $name, $contact, $email, $feedback);
    //$stmt->bind_param("ssss", $name, $contact, $email, $feedback);
    $stmt->bind_param("siss", $name, $contact, $email, $feedback);


    // Execute the statement
    if ($stmt->execute()) {
        echo "Feedback submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
}
?>
