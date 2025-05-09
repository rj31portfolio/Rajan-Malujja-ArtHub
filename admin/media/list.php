<?php
require_once '../../includes/functions.php';
require_once '../../includes/db.php';

if (!isAdmin()) {
    redirect('../login.php');
}

$media = $pdo->query("SELECT * FROM media_images")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Media Videos</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/sidebar.php'; ?>
    <div class="content">
        <h2>Media Videos</h2>
        <a href="add.php" class="btn">Add New Video</a>
        <div class="gallery-grid">
            <?php foreach ($media as $item): ?>
                <div class="gallery-item">
                    <?php echo $item['embed_code']; ?>
                    <p><?php echo $item['caption'] ?: 'No caption'; ?></p>
                    <a href="edit.php?id=<?php echo $item['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $item['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>