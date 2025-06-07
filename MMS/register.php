<?php
include_once('config.php');

if(isset($_POST['submit'])){
    $emri = $_POST['emri'];
$username = $_POST['username'];
$email = $_POST['email'];

$tempPass =$_POST['password'];
$password = password hash($tempPass,PASSWORD_DEFAULT);

$tempConfirm =$_POST['confirm_password'];
$confirm_password = password_hash($tempConfirm, PASSWORD_DEFAULT);

if(empty($emri)) || empty($username) || empty($email) || empty($password) || empty($confirm_password ) {
    echo"You have not filled in all the fieldes."
}

}





?>