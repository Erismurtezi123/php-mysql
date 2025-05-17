<?php
include_once("config.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $tempPass = $_POST['password'];
    $password = password_hash($tempPass, PASSWORD_DEFAULT);

  if (empty($name) || empty($surname) || empty($username) || empty($email) || empty($password)) {
        echo "You need to fill all these fields!";
        header("refresh:2; url=update.php");
    } else{
        $sql = "UPDATE users SET name=:name, surname=:surname, username=:username, email=:email, password=:password WHERE id=:id";
    


    // Prepare the statement
    $prep = $connect->prepare($sql);
    
    // Bind the parameters
    $prep->bindParam(':id', $id);
    $prep->bindParam(':name', $name);
    $prep->bindParam(':surname', $surname);
    $prep->bindParam(':username', $username);
    $prep->bindParam(':email', $email);
    $prep->bindParam(':password', $password);

    
    

    $prep->execute();

    header('Location:dashboard.php');

    }
}
?>