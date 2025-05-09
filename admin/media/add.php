<?php
require_once '../../includes/functions.php';
require_once '../../includes/db.php';

if (!isAdmin()) {
    redirect('../login.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $embed_code = $_POST['embed_code'];
    $caption = filter_input(INPUT_POST, 'caption', FILTER_SANITIZE_STRING);
    
    if (validateYouTubeEmbedCode($embed_code)) {
        $stmt = $pdo->prepare("INSERT INTO media_images (embed_code, caption) VALUES (?, ?)");
        $stmt->execute([$embed_code, $caption]);
        redirect('list.php');
    } else {
        $error = "Invalid YouTube embed code";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Media Video</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/sidebar.php'; ?>
    <div class="content">
        <h2>Add Media Video</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <div>
                <label>YouTube Embed Code</label>
                <textarea name="embed_code" rows="5" required></textarea>
            </div>
            <div>
                <label>Caption</label>
                <input type="text" name="caption">
            </div>
            <button type="submit">Add Video</button>
        </form>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>