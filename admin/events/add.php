<?php
require_once '../../includes/functions.php';
require_once '../../includes/db.php';

if (!isAdmin()) {
    redirect('../login.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    
    if (!empty($_FILES['image']['name'])) {
        $image_path = uploadImage($_FILES['image'], 'events');
        if ($image_path) {
            $stmt = $pdo->prepare("INSERT INTO event_images (image_path, title, description) VALUES (?, ?, ?)");
            $stmt->execute([$image_path, $title, $description]);
            redirect('list.php');
        } else {
            $error = "Failed to upload image";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Event Image</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/sidebar.php'; ?>
    <div class="content">
        <h2>Add Event Image</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
            <div>
                <label>Title</label>
                <input type="text" name="title">
            </div>
            <div>
                <label>Description</label>
                <textarea name="description"></textarea>
            </div>
            <div>
                <label>Image</label>
                <input type="file" name="image" accept="image/*" required>
            </div>
            <button type="submit">Upload Image</button>
        </form>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>