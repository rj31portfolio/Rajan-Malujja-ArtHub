<?php
require_once '../../includes/functions.php';
require_once '../../includes/db.php';

if (!isAdmin()) {
    redirect('../login.php');
}

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM media_images WHERE id = ?");
$stmt->execute([$id]);
$media = $stmt->fetch();

if (!$media) {
    redirect('list.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $embed_code = $_POST['embed_code'];
    $caption = filter_input(INPUT_POST, 'caption', FILTER_SANITIZE_STRING);
    
    if (validateYouTubeEmbedCode($embed_code)) {
        $stmt = $pdo->prepare("UPDATE media_images SET embed_code = ?, caption = ? WHERE id = ?");
        $stmt->execute([$embed_code, $caption, $id]);
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
    <title>Edit Media Video</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/sidebar.php'; ?>
    <div class="content">
        <h2>Edit Media Video</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <div>
                <label>YouTube Embed Code</label>
                <textarea name="embed_code" rows="5" required><?php echo htmlspecialchars($media['embed_code']); ?></textarea>
            </div>
            <div>
                <label>Caption</label>
                <input type="text" name="caption" value="<?php echo htmlspecialchars($media['caption']); ?>">
            </div>
            <div>
                <label>Current Video</label>
                <?php echo $media['embed_code']; ?>
            </div>
            <button type="submit">Update Video</button>
        </form>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>