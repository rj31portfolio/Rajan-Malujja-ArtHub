<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';

if (!isLoggedIn()) {
    redirect('login.php');
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT w.*, a.title, a.price, a.main_image FROM wishlist w JOIN arts a ON w.art_id = a.id WHERE w.user_id = ?");
$stmt->execute([$user_id]);
$wishlist_items = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove'])) {
    $art_id = $_POST['art_id'];
    $stmt = $pdo->prepare("DELETE FROM wishlist WHERE user_id = ? AND art_id = ?");
    $stmt->execute([$user_id, $art_id]);
    redirect('wishlist.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wishlist</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Your Wishlist</h2>
        <div class="art-grid">
            <?php foreach ($wishlist_items as $item): ?>
                <div class="art-card">
                    <img src="assets/uploads/<?php echo $item['main_image']; ?>" alt="<?php echo $item['title']; ?>">
                    <h3><?php echo $item['title']; ?></h3>
                    <p>₹<?php echo $item['price']; ?></p>
                    <form method="POST">
                        <input type="hidden" name="art_id" value="<?php echo $item['art_id']; ?>">
                        <button type="submit" name="remove" class="btn">Remove</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>