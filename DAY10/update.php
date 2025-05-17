<?php
    include_once("config.php");

    if (empty($_SESSION['username'])) {
        header("Location: dashboard.php");
        exit;
    }

    if (!isset($_GET['id'])) {
        die("User ID not provided in the URL.");
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = :id";
    $selectUser = $connect->prepare($sql);
    $selectUser->bindParam(':id', $id);
    $selectUser->execute();

    $logged_user = $selectUser->fetch();

    if (!$logged_user) {
        die("User not found.");
    }
?>

<?php include("header.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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

        /* Profile form container */
        .container {
            display: flex;
            justify-content: center;
            padding: 30px;
        }

        .profile-form {
            width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .profile-form h3 {
            font-size: 1.6rem;
            color: #2C3E50;
            margin-bottom: 20px;
        }

        .profile-form input[type="text"],
        .profile-form input[type="email"],
        .profile-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .profile-form input[type="submit"] {
            background-color: #27AE60;
            color: white;
            padding: 10px 15px;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            border: none;
        }

        .profile-form input[type="submit"]:hover {
            background-color: #2ECC71;
        }

        .profile-form input[type="submit"]:active {
            background-color: #2E9F61;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .profile-form {
                width: 100%;
                padding: 15px;
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

<!-- Profile Update Form -->
<div class="container">
    <div class="profile-form">
        <h3>Edit Your Profile</h3>
        <form method="POST" action="edit.php">
            <input type="hidden" name="id" value="<?php echo $logged_user['id']; ?>">
            <input type="text" name="name" value="<?php echo $logged_user['name']; ?>" required>
            <input type="text" name="surname" value="<?php echo $logged_user['surname']; ?>" required>
            <input type="text" name="username" value="<?php echo $logged_user['username']; ?>" required>
            <input type="email" name="email" value="<?php echo $logged_user['email']; ?>" required>
            <input type="password" name="password" placeholder="Enter new password(optional)">
            <input type="submit" name="update" value="Update Profile">
        </form>
    </div>
</div>

</body>
</html>