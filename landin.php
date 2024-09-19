<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBC E-Learning Platform</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: aqua;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            overflow: hidden; /* Ensure no scrollbars appear */
        }
        .container {
            text-align: center;
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1; /* Ensure it's above the moving text */
            margin-top: 120px; /* Add margin to separate from moving text */
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .moving-text-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100px; /* Adjust as needed */
            overflow: hidden;
            background-color: transparent;
            z-index: 0; /* Ensure it's below the container */
        }
        .moving-text {
            position: absolute;
            white-space: nowrap;
            font-size: 24px; /* Adjust as needed */
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="moving-text-container">
        <div class="moving-text" id="movingText">
            Empowering every student to reach their full potential and become lifelong learners.
        </div>
    </div>

    <div class="container">
        <h1>Welcome to CBC ACADEMY</h1>
        <p>Please register or log in to access our e-learning resources.</p>
        <a href="registration.php" class="button">Sign up</a>
        <a href="login.php" class="button">Log In</a>
    </div>

    <script>
        function moveText() {
            const textElement = document.getElementById('movingText');
            const containerWidth = textElement.parentElement.offsetWidth;
            const textWidth = textElement.offsetWidth;
            let position = containerWidth;

            function animate() {
                position -= 2; // Adjust speed here
                if (position < -textWidth) {
                    position = containerWidth;
                }
                textElement.style.transform = `translateX(${position}px)`;
                requestAnimationFrame(animate);
            }

            animate();
        }

        moveText();
    </script>
</body>
</html>