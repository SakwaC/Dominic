<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CBC E-Learning Feedback</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f7f7f7;
    }
    .container-custom {
      max-width: 600px;
      margin: 60px auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    h1 {
      text-align: center;
      color: #333;
      text-decoration: overline;
      margin-bottom: 30px;
    }
    .top-right {
      position: absolute;
      top: 20px;
      right: 20px;
    }
  </style>
</head>
<body>

  <!-- Back to Home Button -->
  <div class="top-right">
    <a href="home1.php" class="btn btn-dark">Back</a>
  </div>

  <div class="container container-custom">
    <h1>Feedback Form</h1>
    <form action="submit_feedback.php" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label fw-bold">Your Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>

      <div class="mb-3">
        <label for="contact" class="form-label fw-bold">Contact:</label>
        <input type="text" class="form-control" id="contact" name="contact">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label fw-bold">Email:</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>

      <div class="mb-3">
        <label for="feedback" class="form-label fw-bold">Your Feedback:</label>
        <textarea class="form-control" id="feedback" name="feedback" rows="5" required></textarea>
      </div>

      <button type="submit" class="btn btn-success w-100">Submit Feedback</button>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
