<?php
include_once("config.php");

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users(name,username,email) VALUES (:name, :username,:email";

    $sqlQuery ->prepare($sql);
    $sqlQuery ->bindPrama (':name',$name);
    $sqlQuery->bindPrama(':username',$username);
    $sqlQuery->bindPrama(':email',$email);

    $sqlQuery->execute();

    echo "The users was added succesfully";
}


?>