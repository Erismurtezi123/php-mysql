<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delish Diner - Menu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container mt-4">
    <h1 class="mb-4 text-center">🍽️ Our Menu</h1>

    <div class="row g-4">
        <?php
        $stmt = $pdo->query("SELECT * FROM dishes ORDER BY created_at DESC LIMIT 12");
        foreach ($stmt as $dish): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm">
                    <img src="<?= htmlspecialchars($dish['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($dish['name']) ?>" style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($dish['name']) ?></h5>
                        <p class="card-text text-muted mb-1"><?= htmlspecialchars($dish['category']) ?></p>
                        <p class="card-text"><?= substr(htmlspecialchars($dish['description']), 0, 80) ?>...</p>
                    </div>
                    <div class="card-footer bg-white border-top-0">
                        <strong>$<?= number_format($dish['price'], 2) ?></strong>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
