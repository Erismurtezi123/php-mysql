<?php
session_start();
include 'config.php';

// Redirect to login if not authenticated
if (empty($_SESSION['username'])) {
    header("Location: signin.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = (int)$_POST['id'];  // Cast to int for safety
    $name = trim($_POST['name']);
    $category = trim($_POST['category']);
    $price = floatval($_POST['price']);
    $description = trim($_POST['description']);
    $image_url = trim($_POST['image_url']);

    if (empty($name) || empty($category) || $price <= 0 || empty($description) || empty($image_url)) {
        $_SESSION['error'] = "All fields are required and price must be greater than zero!";
        header("Location: update.php?id=$id");
        exit();
    }

    $sql = "UPDATE dishes SET name=:name, category=:category, price=:price, description=:description, image_url=:image_url WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image_url', $image_url);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: dashboard.php?success=updated");
    exit();
}

// GET request validation
if (!isset($_GET['id'])) {
    die("Dish ID not provided.");
}

$id = (int)$_GET['id'];
$sql = "SELECT * FROM dishes WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$dish = $stmt->fetch();

if (!$dish) {
    die("Dish not found.");
}
?>

<?php include 'header.php'; ?>

<div class="container mt-5">
    <h2 class="text-white mb-4">Edit Dish</h2>

    <!-- Show error if exists -->
    <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-danger text-center">
            <?= htmlspecialchars($_SESSION['error']) ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form method="POST" action="update.php" class="text-white">
        <input type="hidden" name="id" value="<?= $dish['id'] ?>">

        <div class="mb-3">
            <label class="form-label">Dish Name</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($dish['name']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" value="<?= htmlspecialchars($dish['category']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Price ($)</label>
            <input type="number" step="0.01" name="price" class="form-control" value="<?= number_format($dish['price'], 2) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required><?= htmlspecialchars($dish['description']) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Image URL</label>
            <input type="text" name="image_url" class="form-control" value="<?= htmlspecialchars($dish['image_url']) ?>" required>
        </div>

        <button type="submit" name="update" class="btn btn-danger">Update Dish</button>
    </form>
</div>

<?php include 'footer.php'; ?>
