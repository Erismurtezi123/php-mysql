<?php

require 'config.php';
session_start(); // Required to use $_SESSION

if (isset($_POST['submit'])) {
    $username = $_POST['username']; // FIXED: changed - to =
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Fill all the fields!";
        header("refresh:2; url=signin.php"); // FIXED: added semicolon after refresh
        exit(); // GOOD PRACTICE: stop further execution after header
    } else {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $conn->prepare($sql); // FIXED: removed unnecessary parentheses
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC); // USE FETCH_ASSOC for associative array
            if (password_verify($password, $data['password'])) { // FIXED: correct function usage
                $_SESSION['username'] = $data['username'];
                header("Location: dashboard.php");
                exit(); // Always use exit after header redirect
            } else {
                echo "Incorrect password!";
            }
        } else {
            echo "User not found!";
        }
    }
}
?>
