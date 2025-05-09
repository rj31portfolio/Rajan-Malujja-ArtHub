<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';

$photos = $pdo->query("SELECT * FROM celebrity_photos")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Celebrity Gallery</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Celebrity Gallery</h2>
        <div class="gallery-grid">
            <?php foreach ($photos as $photo): ?>
                <div class="gallery-item">
                    <img src="assets/uploads/<?php echo $photo['image_path']; ?>" alt="Celebrity Photo">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>