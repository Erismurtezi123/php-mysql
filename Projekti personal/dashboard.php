<?php
include 'config.php';
include 'header.php';

$stmt = $pdo->prepare("SELECT * FROM dishes ORDER BY id DESC");
$stmt->execute();
$dishes = $stmt->fetchAll();

$userStmt = $pdo->prepare("SELECT * FROM users ORDER BY id DESC");
$userStmt->execute();
$users = $userStmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f5f0;
            color: #333;
        }

        .navbar {
            background: #8B0000;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .navbar .welcome-text {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .navbar .logout-btn {
            background: #fff;
            color: #8B0000;
            padding: 8px 15px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar .logout-btn:hover {
            background: #f0f0f0;
        }

        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .dashboard-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .dashboard-section h3 {
            margin-bottom: 15px;
            font-size: 1.5rem;
            color: #8B0000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.95rem;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f3f3f3;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        td a {
            color: #8B0000;
            text-decoration: none;
            font-weight: 500;
        }

        td a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="welcome-text">Welcome, <?php echo $_SESSION['username']; ?></div>
    <a class="logout-btn" href="logout.php">Logout</a>
</div>

<div class="container">

    <div class="dashboard-section">
        <h3>All Dishes</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Dish Name</th>
                    <th>Category</th>
                    <th>Price ($)</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dishes as $dish): ?>
                    <tr>
                        <td><?= $dish['id']; ?></td>
                        <td><?= htmlspecialchars($dish['name']); ?></td>
                        <td><?= htmlspecialchars($dish['category']); ?></td>
                        <td><?= number_format($dish['price'], 2); ?></td>
                        <td>
                            <img src="<?= $dish['image']; ?>" alt="Dish Image" width="60" height="40" style="object-fit:cover;">
                        </td>
                        <td>
                            <a href="updatedish.php?id=<?= $dish['id']; ?>">Edit</a> |
                            <a href="deletedish.php?id=<?= $dish['id']; ?>" onclick="return confirm('Are you sure you want to delete this dish?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="dashboard-section">
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
                        <td><?= $user['id']; ?></td>
                        <td><?= htmlspecialchars($user['name']); ?></td>
                        <td><?= htmlspecialchars($user['surname']); ?></td>
                        <td><?= htmlspecialchars($user['username']); ?></td>
                        <td><?= htmlspecialchars($user['email']); ?></td>
                        <td>
                            <a href="updateuser.php?id=<?= $user['id']; ?>">Edit</a> |
                            <a href="deleteuser.php?id=<?= $user['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?php include 'footer.php'; ?>
</body>
</html>
