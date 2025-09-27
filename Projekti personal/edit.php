<?php
include_once("config.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $category = trim($_POST['category']);
    $price = trim($_POST['price']);
    $description = trim($_POST['description']);
    $image = trim($_POST['image']);

    if (empty($name) || empty($category) || empty($price) || empty($description)) {
        header("Location: updatedish.php?id=$id&error=empty_fields");
        exit();
    }

    $sql = "UPDATE dishes 
            SET name = :name, category = :category, price = :price, description = :description, image = :image 
            WHERE id = :id";

    $prep = $pdo->prepare($sql);
    $prep->bindParam(':id', $id);
    $prep->bindParam(':name', $name);
    $prep->bindParam(':category', $category);
    $prep->bindParam(':price', $price);
    $prep->bindParam(':description', $description);
    $prep->bindParam(':image', $image);

    $prep->execute();

    header("Location: dashboard.php?success=dish_updated");
    exit();
}

if (!isset($_GET['id'])) {
    die("Dish ID missing");
}

$id = (int)$_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM dishes WHERE id = ?");
$stmt->execute([$id]);
$dish = $stmt->fetch();

if (!$dish) {
    die("Dish not found");
}
?>

<?php include 'header.php'; ?>

<div class="container mt-5">
    <h2 class="mb-4">Edit Dish</h2>

    <form action="updatedish.php" method="post">
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
            <input type="number" step="0.01" name="price" class="form-control" value="<?= htmlspecialchars($dish['price']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required><?= htmlspecialchars($dish['description']) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Image URL</label>
            <input type="text" name="image" class="form-control" value="<?= htmlspecialchars($dish['image']) ?>" required>
        </div>

        <button type="submit" name="update" class="btn btn-primary">Update Dish</button>
    </form>
</div>

<?php include 'footer.php'; ?>
