<?php

include_once('config.php');

if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $temppass = $_POST['password'];
    $password = password_hash($temppass, PASSWORD_DEFAULT);

    if(empty($name) || empty($surname) || empty($username) || empty($email) || empty($password)) {
        echo "You need to fill all these fields.";
    } else {
        // Check if the username already exists
        $sql = "SELECT username FROM users WHERE username = :username";
        $tempSQL = $conn->prepare($sql);
        $tempSQL->bindParam(':username', $username);
        $tempSQL->execute();

        // Fetch the result and check if the username exists
        if($tempSQL->rowCount() > 0) {
            echo "Username already exists.";
            header("refresh:2; url=signupform.php");
            exit;
        } else {
            // Insert the new user into the database
            $sql = "INSERT INTO users (name, surname, username, email, password) VALUES (:name, :surname, :username, :email, :password)";
            $insertSql = $conn->prepare($sql);
            $insertSql->bindParam(':name', $name);
            $insertSql->bindParam(':surname', $surname);
            $insertSql->bindParam(':username', $username);
            $insertSql->bindParam(':email', $email);
            $insertSql->bindParam(':password', $password);

            try {
                $insertSql->execute();
                echo "Data saved successfully!";
                header("refresh:2; url=signin.php");
                exit;
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
}
?>