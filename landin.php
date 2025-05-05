<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CBC E-Learning Platform</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: aqua;
      margin: 0;
      padding: 0;
      height: 100vh;
      overflow: hidden;
    }
    .logo {
      height: 100px; /* Increased logo size */
    }
  </style>
</head>
<body>

  <!-- Logo aligned to top-left -->
  <div class="container-fluid py-3">
    <div class="d-flex justify-content-start">
      <a href="index.php">
        <img src="logo.jpg" alt="CBC Academy Logo" class="logo ms-3"/>
      </a>
    </div>
  </div>

  <!-- Static Banner without background -->
  <div class="text-center py-2">
    <strong class="text-dark fs-3">
      Empowering every student to reach their full potential.
    </strong>
  </div>

  <!-- Main Content: Smaller Container -->
  <div class="container-sm text-center bg-white p-4 mt-4 rounded shadow" style="max-width: 500px;">
    <h1 class="text-primary">Welcome to CBC ACADEMY</h1>
    <p class="text-muted">Please register or log in to access our e-learning resources.</p>
    <div class="d-flex justify-content-center gap-3 mt-4">
      <a href="registration.php" class="btn btn-primary px-4">Sign up</a>
      <a href="login.php" class="btn btn-secondary px-4">Log In</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
