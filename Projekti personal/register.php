<?php
session_start();
include_once('config.php');

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $tempPass = trim($_POST['password']);

    if (empty($name) || empty($surname) || empty($username) || empty($email) || empty($tempPass)) {
        echo "<p style='color:red;'>All fields are required!</p>";
        header("refresh:2; url=register.php");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color:red;'>Invalid email format!</p>";
        header("refresh:2; url=register.php");
        exit();
    }

    $checkSql = "SELECT username FROM users WHERE username = :username";
    $stmt = $pdo->prepare($checkSql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "<p style='color:red;'>Username already exists!</p>";
        header("refresh:2; url=register.php");
        exit();
    }

    $password = password_hash($tempPass, PASSWORD_DEFAULT);

    $insertSql = "INSERT INTO users (name, surname, username, email, password_hash) 
                  VALUES (:name, :surname, :username, :email, :password)";
    $insertStmt = $pdo->prepare($insertSql);
    $insertStmt->bindParam(':name', $name);
    $insertStmt->bindParam(':surname', $surname);
    $insertStmt->bindParam(':username', $username);
    $insertStmt->bindParam(':email', $email);
    $insertStmt->bindParam(':password', $password);

    if ($insertStmt->execute()) {
        echo "<p style='color:green;'>Registration successful! Redirecting to login...</p>";
        header("refresh:2; url=signin.php");
        exit();
    } else {
        echo "<p style='color:red;'>Failed to register. Try again!</p>";
        header("refresh:2; url=register.php");
        exit();
    }
}
?>

<?php include 'header.php'; ?>

<div class="container mt-5">
    <h2 class="text-white mb-4">Register</h2>
    <form method="post" action="register.php" class="text-white">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Surname</label>
            <input type="text" name="surname" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required minlength="6">
        </div>

        <button type="submit" name="submit" class="btn btn-danger">Register</button>
    </form>
</div>

<?php include 'footer.php'; ?>
