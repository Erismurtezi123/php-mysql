<?php
$user = 'root';        
$pass = '';            
$server = 'localhost'; 
$dbname = 'mms';       

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection successful!";
} catch (PDOException $e) {
    
    echo "Error: " . $e->getMessage();
}
?>