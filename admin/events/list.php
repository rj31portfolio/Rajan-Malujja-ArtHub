<?php
require_once '../../includes/functions.php';
require_once '../../includes/db.php';

if (!isAdmin()) {
    redirect('../login.php');
}

$events = $pdo->query("SELECT * FROM event_images")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Images</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/sidebar.php'; ?>
    <div class="content">
        <h2>Event Images</h2>
        <a href="add.php" class="btn">Add New Image</a>
        <div class="gallery-grid">
            <?php foreach ($events as $event): ?>
                <div class="gallery-item">
                    <img src="../../assets/uploads/<?php echo $event['image_path']; ?>" alt="<?php echo $event['title']; ?>" width="100">
                    <p><?php echo $event['title']; ?></p>
                    <a href="edit.php?id=<?php echo $event['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $event['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>