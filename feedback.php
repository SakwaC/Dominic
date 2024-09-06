<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBC E-Learning Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f7f7f7;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            text-decoration: overline;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        textarea {
            width: 100%;
            height: 150px;
            padding: 10px;
            margin-top: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Feedback Form</h1>
        <form action="submit_feedback.php" method="POST">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="contact">Contact</label>
            <input type="text" id="contact" name="contact">

            <label for="email">email:</label>
            <input  type="email"id="email" name="email">

            <label for="feedback">Your Feedback:</label>
            <textarea id="feedback" name="feedback" required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>
    </div>
</body>
</html>
