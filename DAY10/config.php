<?php
    session_start();

    $server = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'dbtest';

    try{
        $connect = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);

    }catch(Exception $e){
        echo "Something went wrong";
    }

?>