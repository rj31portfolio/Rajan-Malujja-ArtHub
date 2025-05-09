<?php
require_once '../../includes/functions.php';
require_once '../../includes/db.php';

if (!isAdmin()) {
    redirect('../login.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_FILES['image']['name'])) {
        $image_path = uploadImage($_FILES['image'], 'celebrity');
        if ($image_path) {
            $stmt = $pdo->prepare("INSERT INTO celebrity_photos (image_path) VALUES (?)");
            $stmt->execute([$image_path]);
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
    <title>Add Celebrity Photo</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/sidebar.php'; ?>
    <div class="content">
        <h2>Add Celebrity Photo</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
            <div>
                <label>Image</label>
                <input type="file" name="image" accept="image/*" required>
            </div>
            <button type="submit">Upload Photo</button>
        </form>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>