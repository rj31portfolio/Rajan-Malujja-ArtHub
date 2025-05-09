<?php
require_once '../../includes/functions.php';
require_once '../../includes/db.php';

if (!isAdmin()) {
    redirect('../login.php');
}

$photos = $pdo->query("SELECT * FROM celebrity_photos")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Celebrity Photos</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/sidebar.php'; ?>
    <div class="content">
        <h2>Celebrity Photos</h2>
        <a href="add.php" class="btn">Add New Photo</a>
        <div class="gallery-grid">
            <?php foreach ($photos as $photo): ?>
                <div class="gallery-item">
                    <img src="../../assets/uploads/<?php echo $photo['image_path']; ?>" alt="Celebrity Photo" width="100">
                    <a href="delete.php?id=<?php echo $photo['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>