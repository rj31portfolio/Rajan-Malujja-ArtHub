<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';

$featured_arts = $pdo->query("SELECT * FROM arts WHERE status = 'featured' LIMIT 6")->fetchAll();
$categories = $pdo->query("SELECT * FROM categories LIMIT 4")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Artify Hub</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <section class="banner">
            <h1>Welcome to Artify Hub</h1>
            <p>Discover unique artworks from talented artists</p>
        </section>
        <section class="featured-arts">
            <h2>Featured Arts</h2>
            <div class="art-grid">
                <?php foreach ($featured_arts as $art): ?>
                    <div class="art-card">
                        <img src="assets/uploads/<?php echo $art['main_image']; ?>" alt="<?php echo $art['title']; ?>">
                        <h3><?php echo $art['title']; ?></h3>
                        <p>₹<?php echo $art['price']; ?></p>
                        <a href="art-details.php?slug=<?php echo $art['slug']; ?>" class="btn">View Details</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="categories">
            <h2>Explore Categories</h2>
            <div class="category-grid">
                <?php foreach ($categories as $category): ?>
                    <div class="category-card">
                        <h3><?php echo $category['name']; ?></h3>
                        <a href="art-listing.php?category=<?php echo $category['slug']; ?>" class="btn">Browse</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>