<?php
try{
$pdo = new PDO("mysql:host=localhost;dbname=erisss", "root", "");

//$username = "Erisss";
//$password =password_hash("mypassword1234", PASSWORD_DEFAULT);
//$email = "test@gmail.com";
//$sql = "INSERT INTO users(username,password) VALUES ('$username','$password')";


//$sql= "ALTER table users ADD email VARCHAR(255)";

//$sql = "ALTER tables users DROP COLUMN email";

$sql = "DROP TABLE PRODUCTS";

$pdo->exec($sql);

echo "New Table deleted succesfully";
}catch(DOExecption $e){

{echo $e->getMessage();

}



}





?> 