<?php
require 'config.php';

if (empty($_SESSION['username'])) {
    header("Location: signin.php");
    exit();
}

$getUsers = $connect->prepare("SELECT * FROM users");
$getUsers->execute();
$users = $getUsers->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }

        /* Navbar */
        .navbar {
            background: #2C3E50;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .welcome-text {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .navbar .logout-btn {
            background: #E74C3C;
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 1rem;
        }

        .navbar .logout-btn:hover {
            background: #C0392B;
        }

        /* Main container */
        .container {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }

        /* Users Table */
        .users-table {
            width: 70%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .users-table h3 {
            margin-bottom: 15px;
            font-size: 1.5rem;
            color: #2C3E50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #34495E;
            color: white;
            font-weight: bold;
        }

        td {
            background-color: #ECF0F1;
        }

        td a {
            color: #2980B9;
            text-decoration: none;
            font-weight: 500;
        }

        td a:hover {
            color: #3498DB;
        }

        /* Action buttons */
        td a:active {
            color: #1F78D1;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .users-table {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <div class="welcome-text">Welcome, <?php echo $_SESSION['username']; ?></div>
    <a class="logout-btn" href="logout.php">Logout</a>
</div>

<!-- Main Content -->
<div class="container">
    <!-- Users Table -->
    <div class="users-table">
        <h3>All Users</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['surname']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>
                        <a href="delete.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a> |
                        <a href="update.php?id=<?php echo $user['id']; ?>">Edit</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>