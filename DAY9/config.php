<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db';

try {
    $connect = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
    // Set error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
