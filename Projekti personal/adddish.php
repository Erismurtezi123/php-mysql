<?php
session_start();
include 'config.php';

if(empty($_SESSION['username'])) {
    header("Location: signin.php");
    exit();
}

if(isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $category = trim($_POST['category']);
    $price = floatval($_POST['price']);
    $description = trim($_POST['description']);

    if(isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $uploadDir = 'uploads/';
        $fileName = time() . '_' . basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $fileName;

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if(!in_array($_FILES['image']['type'], $allowedTypes)) {
            die("Only JPG, PNG, GIF images are allowed.");
        }

        if(move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $image = $targetFile;
        } else {
            die("Failed to upload image.");
        }
    } else {
        die("No image uploaded.");
    }

    $stmt = $pdo->prepare("INSERT INTO dishes (name, category, price, description, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $category, $price, $description, $image]);

    header("Location: dashboard.php");
    exit();
}
?>

<?php include 'header.php'; ?>

<div class="container mt-5">
    <h2 class="text-white mb-4">Add New Dish</h2>
    <form action="adddish.php" method="post" enctype="multipart/form-data" class="text-white">
        <div class="mb-3">
            <label class="form-label">Dish Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" placeholder="e.g., Starter, Main Course, Dessert" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Price ($)</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Dish Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <button type="submit" name="submit" class="btn btn-danger">Add Dish</button>
    </form>
</div>

<?php include 'footer.php'; ?>
