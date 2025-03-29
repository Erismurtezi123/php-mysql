<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'users';

try{
    $content = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
    }catch(Exception $e){

    }
?>

