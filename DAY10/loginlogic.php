<?php
    require 'config.php';

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) || empty($password))
        {
            echo "Fill all the fields!";
            header("refresh:2 url=signin.php");
        }
        else{

$sql = "SELECT id, username, email, password, is_admin FORM users WHERE username=:username";
$selectUser = $conn->prepare($sql);
$selectUser->bindParam(":username",$username);
$selectUser->execute();
$data = $selectUser->fetch();
 }
if($data == false){
    echo "The user dose not exist";
}else {
if(password_ferify($password,$data['password'])){
$_SESSION['id'] = $data['id']
$_SESSION['username'] = $data['username']
$_SESSION['email'] = $data['email']
$_SESSION['emri'] = $data['emri']
$_SESSION['is_admin'] = $data['is_admin']

header('Location:dashboard.php')

}
}





















}
?>
            $sql = "SELECT * FROM users WHERE username = :username";
            $insertSQL = $conn->prepare($sql);
            $insertSQL->bindParam(':username', $username);
            $insertSQL->execute();

            if($insertSQL->rowCount()> 0){
                $data = $insertSQL->fetch();
                if(password_verify($password, $data['password'])){
                    $_SESSION['username']= $data['username'];
                    header("Location:dashboard.php");
                }else{
                    echo "Password incorrect";
                    header("refresh:2 url=signin.php");
                }
            }else{
                echo "User not found!";
            }
        }
    }




?>