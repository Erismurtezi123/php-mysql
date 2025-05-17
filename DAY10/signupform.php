<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign Up Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h2 class="mb-4">Sign Up</h2>
  <form action="register.php" method="post">
    <div class="mb-3">
      <label for="firstName" class="form-label">Name</label>
      <input type="text" class="form-control" name="name" id="firstName" placeholder="Enter your name">
    </div>
    
    <div class="mb-3">
      <label for="lastName" class="form-label">Surname</label>
      <input type="text" class="form-control" name="surname" id="lastName" placeholder="Enter your surname">
    </div>

    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" name="username" id="username" placeholder="Choose a username">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" name="password"  id="password" placeholder="Enter your password">
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
  </form>
  <p class="mt-3">Already have an account? <a href="signin.php">Log in here</a></p>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>