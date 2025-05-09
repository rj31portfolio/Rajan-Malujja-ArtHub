<?php
require_once '../../includes/functions.php';
require_once '../../includes/db.php';

if (!isAdmin()) {
    redirect('../login.php');
}

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $slug = generateSlug($title);
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $meta_description = $_POST['meta_description'];
    $stock = $_POST['stock'];
    $status = $_POST['status'];
    
    // Handle main images
    $main_image = uploadImage($_FILES['main_image'], 'arts');
    $main_image_2 = uploadImage($_FILES['main_image_2'], 'arts');

    if (!$main_image || !$main_image_2) {
        $error = "Failed to upload one or more main images";
    } else {
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare("INSERT INTO arts (title, slug, category_id, price, description, meta_description, main_image, main_image_2, stock, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$title, $slug, $category_id, $price, $description, $meta_description, $main_image, $main_image_2, $stock, $status]);
            $art_id = $pdo->lastInsertId();
            
            // Handle gallery images
            if (!empty($_FILES['gallery_images']['name'][0])) {
                foreach ($_FILES['gallery_images']['tmp_name'] as $key => $tmp_name) {
                    $gallery_image = uploadImage([
                        'name' => $_FILES['gallery_images']['name'][$key],
                        'tmp_name' => $tmp_name,
                        'size' => $_FILES['gallery_images']['size'][$key],
                        'type' => $_FILES['gallery_images']['type'][$key]
                    ], 'arts');
                    if ($gallery_image) {
                        $stmt = $pdo->prepare("INSERT INTO art_images (art_id, image_path) VALUES (?, ?)");
                        $stmt->execute([$art_id, $gallery_image]);
                    }
                }
            }
            $pdo->commit();
            redirect('list.php');
        } catch (Exception $e) {
            $pdo->rollBack();
            $error = "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Art</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/sidebar.php'; ?>
    <div class="content">
        <h2>Add Art</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
            <div>
                <label>Title</label>
                <input type="text" name="title" required>
            </div>
            <div>
                <label>Meta Description</label>
                <textarea name="meta_description" required></textarea>
            </div>
            <div>
                <label>Category</label>
                <select name="category_id" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label>Price</label>
                <input type="number" name="price" step="0.01" required>
            </div>
            <div>
                <label>Description</label>
                <textarea name="description" id="editor"></textarea>
            </div>
            <div>
                <label>Main Image</label>
                <input type="file" name="main_image" accept="image/*" required>
            </div>
            
            <div>
                <label>Main Image 2</label>
                <input type="file" name="main_image_2" accept="image/*" required>
            </div>
            <div>
                <label>Gallery Images</label>
                <input type="file" name="gallery_images[]" accept="image/*" multiple>
            </div>
            <div>
                <label>Stock</label>
                <input type="number" name="stock" min="0" required>
            </div>
            <div>
                <label>Status</label>
                <select name="status">
                    <option value="in_stock">In Stock</option>
                    <option value="sold_out">Sold Out</option>
                    <option value="featured">Featured</option>
                </select>
            </div>
            <button type="submit">Add Art</button>
        </form>
    </div>
    <script>
        CKEDITOR.replace('editor');
    </script>
    <?php include '../includes/footer.php'; ?>
</body>
</html>