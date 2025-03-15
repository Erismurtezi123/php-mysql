<?php
try{
$pdo = new PDO("mysql:host=localhost;dbname=database"),

$username = "Eris";
$password =password_hash("mypassword", PASSWORD_DEFAULT);
$SQL = "INSERT INTO users(username,password) VALUES ("$username","$password")";

$pdo->exec($sql);

echo "New record create succesfully";
}catch(DOExecption $e){

{echo $e->getMessage();

}



}





?> 