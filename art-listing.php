<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';

$category_slug = isset($_GET['category']) ? $_GET['category'] : '';
$where = $category_slug ? "WHERE c.slug = ?" : "";
$params = $category_slug ? [$category_slug] : [];

$query = "SELECT a.*, c.name as category_name FROM arts a LEFT JOIN categories c ON a.category_id = c.id $where";
$stmt = $pdo->prepare($query);
$stmt->execute($params);
$arts = $stmt->fetchAll();

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art Listing</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Artworks</h2>
        <div class="filters">
            <form method="GET">
                <select name="category" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['slug']; ?>" <?php echo $category_slug === $category['slug'] ? 'selected' : ''; ?>>
                            <?php echo $category['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>
        <div class="art-grid">
            <?php foreach ($arts as $art): ?>
                <div class="art-card">
                    <img src="assets/uploads/<?php echo $art['main_image']; ?>" alt="<?php echo $art['title']; ?>">
                    <h3><?php echo $art['title']; ?></h3>
                    <p>$<?php echo $art['price']; ?></p>
                    <a href="art-details.php?slug=<?php echo $art['slug']; ?>" class="btn">View Details</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>