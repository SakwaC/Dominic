<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CBC E-Learning Games</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      padding: 20px;
      background-color: #54b38e;
    }

    .container-custom {
      max-width: 800px;
      margin: 0 auto 30px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      color: #333;
      font-style: italic;
      text-decoration: underline;
    }

    iframe {
      width: 100%;
      height: 400px;
      border: none;
      border-radius: 8px;
      margin-top: 10px;
    }

    p {
      text-align: center;
      font-size: medium;
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
    <h1>PLAY GAMES</h1>
    <p>Enjoy these educational games while using the CBC e-learning platform.</p>
  </div>

  <div class="container">
    <div class="row g-4">
      <div class="col-md-6">
        <h4>Critical Thinking Challenge</h4>
        <iframe src="https://www.puzzleprime.com/logic/logic-puzzles/" allowfullscreen></iframe>
      </div>
      <div class="col-md-6">
        <h4>Math Quest</h4>
        <iframe src="https://phet.colorado.edu/sims/html/arithmetic/latest/arithmetic_en.html" allowfullscreen></iframe>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
