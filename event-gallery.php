<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';

$events = $pdo->query("SELECT * FROM event_images")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Gallery</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Event Gallery</h2>
        <div class="gallery-grid">
            <?php foreach ($events as $event): ?>
                <div class="gallery-item">
                    <img src="assets/uploads/<?php echo $event['image_path']; ?>" alt="<?php echo $event['title']; ?>">
                    <h3><?php echo $event['title']; ?></h3>
                    <p><?php echo $event['description']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>