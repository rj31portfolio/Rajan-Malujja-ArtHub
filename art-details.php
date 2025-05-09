<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';

$slug = $_GET['slug'] ?? '';
$stmt = $pdo->prepare("SELECT a.*, c.name as category_name FROM arts a LEFT JOIN categories c ON a.category_id = c.id WHERE a.slug = ?");
$stmt->execute([$slug]);
$art = $stmt->fetch();

if (!$art) {
    redirect('index.php');
}

$gallery_images = $pdo->prepare("SELECT * FROM art_images WHERE art_id = ?");
$gallery_images->execute([$art['id']]);
$gallery = $gallery_images->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    if (!isLoggedIn()) {
        redirect('login.php');
    }
    $user_id = $_SESSION['user_id'];
    $quantity = 1;
    
    $stmt = $pdo->prepare("SELECT * FROM cart WHERE user_id = ? AND art_id = ?");
    $stmt->execute([$user_id, $art['id']]);
    if ($stmt->fetch()) {
        $stmt = $pdo->prepare("UPDATE cart SET quantity = quantity + 1 WHERE user_id = ? AND art_id = ?");
        $stmt->execute([$user_id, $art['id']]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO cart (user_id, art_id, quantity) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $art['id'], $quantity]);
    }
    redirect('cart.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $art['title']; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* Style for main image */
        .art-main-image img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        
        /* Style for gallery images */
        .gallery-grid img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        /* Responsive design for gallery */
        @media (max-width: 768px) {
            .gallery-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }
        }
        @media (max-width: 480px) {
            .gallery-grid {
                display: grid;
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <div class="art-details">
            <div class="art-main-image">
                <img src="assets/uploads/<?php echo $art['main_image']; ?>" alt="<?php echo $art['title']; ?>">
            </div>
            <div class="art-info">
                <h2><?php echo $art['title']; ?></h2>
                <p>Category: <?php echo $art['category_name']; ?></p>
                <p>Price: $<?php echo $art['price']; ?></p>
                <p>Stock: <?php echo $art['stock']; ?></p>
                <p><?php echo $art['description']; ?></p>
                <form method="POST">
                    <button type="submit" name="add_to_cart" class="btn" <?php echo $art['stock'] == 0 ? 'disabled' : ''; ?>>Add to Cart</button>
                </form>
            </div>
        </div>
        <div class="gallery">
            <h3>Gallery</h3>
            <div class="gallery-grid">
                <?php foreach ($gallery as $image): ?>
                    <img src="assets/uploads/<?php echo $image['image_path']; ?>" alt="Gallery Image">
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
