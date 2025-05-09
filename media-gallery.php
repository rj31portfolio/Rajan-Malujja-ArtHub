<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';

$media = $pdo->query("SELECT * FROM media_images")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Media Gallery</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Media Gallery</h2>
        <div class="gallery-grid">
            <?php foreach ($media as $item): ?>
                <div class="gallery-item">
                    <?php echo $item['embed_code']; ?>
                    <p><?php echo $item['caption'] ?: 'No caption'; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>