<?php
session_start();
require 'config.php';

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Please fill in all fields!";
        header("Location: signin.php");
        exit();
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch();

        if (password_verify($password, $user['password_hash'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'is_admin' => $user['is_admin'],
                'name' => $user['name'] ?? ''
            ];

            if ($user['is_admin']) {
                header("Location: dashboard.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            $_SESSION['error'] = "Incorrect password!";
            header("Location: signin.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "User not found!";
        header("Location: signin.php");
        exit();
    }
}
?>
