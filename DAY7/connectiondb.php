<?php
$host = "localhost";
$db = "eris";
$user = "root";
$pass = "";

try {
    
    $conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
    
   
    $sql = "CREATE TABLE users (
        id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(30) NOT NULL
    )";

    
    $conn->exec($sql);
    
   
    echo "Table created successfully";
} catch (Exception $e) {
   
    echo "Something went wrong! " . $e->getMessage();
}
?>
