<?php
require_once '../../includes/functions.php';
require_once '../../includes/db.php';

if (!isAdmin()) {
    redirect('../login.php');
}

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM event_images WHERE id = ?");
$stmt->execute([$id]);
$event = $stmt->fetch();

if (!$event) {
    redirect('list.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    
    if (!empty($_FILES['image']['name'])) {
        $image_path = uploadImage($_FILES['image'], 'events');
        if ($image_path) {
            unlink(__DIR__ . '/../../assets/uploads/' . $event['image_path']);
            $stmt = $pdo->prepare("UPDATE event_images SET image_path = ?, title = ?, description = ? WHERE id = ?");
            $stmt->execute([$image_path, $title, $description, $id]);
        } else {
            $error = "Failed to upload image";
        }
    } else {
        $stmt = $pdo->prepare("UPDATE event_images SET title = ?, description = ? WHERE id = ?");
        $stmt->execute([$title, $description, $id]);
    }
    redirect('list.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Event Image</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/sidebar.php'; ?>
    <div class="content">
        <h2>Edit Event Image</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
            <div>
                <label>Title</label>
                <input type="text" name="title" value="<?php echo $event['title']; ?>">
            </div>
            <div>
                <label>Description</label>
                <textarea name="description"><?php echo $event['description']; ?></textarea>
            </div>
            <div>
                <label>Current Image</label>
                <img src="../../assets/uploads/<?php echo $event['image_path']; ?>" alt="<?php echo $event['title']; ?>" width="100">
            </div>
            <div>
                <label>New Image (Optional)</label>
                <input type="file" name="image" accept="image/*">
            </div>
            <button type="submit">Update Image</button>
        </form>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>