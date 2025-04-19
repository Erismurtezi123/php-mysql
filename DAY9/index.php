<?php
    include('config.php');

    $sql = "SELECT * FROM users";

    $getUsers = $connect->prepare($sql);

    $getUsers->execute();

    $users = $getUsers->fetchAll();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, td, th{
            border:1px solid black;
            border-collapse:collapse;
        }
        td,th{
            padding:10px 20px;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <th>id</th>
            <th>name</th>
            <th>username</th>
            <th>email</th>
        </thead>
        <tbody>
            <?php
                foreach($users as $user){
                    ?>
                    <tr>
                        <td><?=$user['id']?></td>
                        <td><?=$user['name']?></td>
                        <td><?=$user['username']?></td>
                        <td><?=$user['email']?></td>
                        <td><?="<a href = 'delete.php?id=$user[id]'>Delete</a>"?></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
    <a href="index.html">Add User</a>
</body>
</html>