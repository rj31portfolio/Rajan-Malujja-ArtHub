<?php
require_once '../../includes/functions.php';
require_once '../../includes/db.php';

if (!isAdmin()) {
    redirect('../login.php');
}

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM arts WHERE id = ?");
$stmt->execute([$id]);
$art = $stmt->fetch();

if (!$art) {
    redirect('list.php');
}

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
$gallery_images = $pdo->prepare("SELECT * FROM art_images WHERE art_id = ?");
$gallery_images->execute([$id]);
$gallery = $gallery_images->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $slug = generateSlug($title);
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $meta_description = $_POST['meta_description'];
    $stock = $_POST['stock'];
    $status = $_POST['status'];

    $pdo->beginTransaction();
    try {
        // Handle main image
        $main_image = $art['main_image'];
        if (!empty($_FILES['main_image']['name'])) {
            $new_image = uploadImage($_FILES['main_image'], 'arts');
            if ($new_image) {
                unlink(__DIR__ . '/../../assets/uploads/' . $main_image);
                $main_image = $new_image;
            } else {
                throw new Exception("Failed to upload main image");
            }
        }

        // Handle main image 2
        $main_image_2 = $art['main_image_2'];
        if (!empty($_FILES['main_image_2']['name'])) {
            $new_image_2 = uploadImage($_FILES['main_image_2'], 'arts');
            if ($new_image_2) {
                unlink(__DIR__ . '/../../assets/uploads/' . $main_image_2);
                $main_image_2 = $new_image_2;
            } else {
                throw new Exception("Failed to upload main image 2");
            }
        }

        // Update art
        $stmt = $pdo->prepare("UPDATE arts SET title = ?, slug = ?, category_id = ?, price = ?, description = ?, meta_description = ?, main_image = ?, main_image_2 = ?, stock = ?, status = ? WHERE id = ?");
        $stmt->execute([$title, $slug, $category_id, $price, $description, $meta_description, $main_image, $main_image_2, $stock, $status, $id]);

        // Handle gallery images
        if (!empty($_FILES['gallery_images']['name'][0])) {
            foreach ($_FILES['gallery_images']['tmp_name'] as $key => $tmp_name) {
                if ($_FILES['gallery_images']['name'][$key]) {
                    $gallery_image = uploadImage([
                        'name' => $_FILES['gallery_images']['name'][$key],
                        'tmp_name' => $tmp_name,
                        'size' => $_FILES['gallery_images']['size'][$key],
                        'type' => $_FILES['gallery_images']['type'][$key]
                    ], 'arts');
                    if ($gallery_image) {
                        $stmt = $pdo->prepare("INSERT INTO art_images (art_id, image_path) VALUES (?, ?)");
                        $stmt->execute([$id, $gallery_image]);
                    }
                }
            }
        }

        // Handle gallery image deletions
        if (!empty($_POST['delete_images'])) {
            foreach ($_POST['delete_images'] as $image_id) {
                $stmt = $pdo->prepare("SELECT image_path FROM art_images WHERE id = ? AND art_id = ?");
                $stmt->execute([$image_id, $id]);
                $image = $stmt->fetch();
                if ($image) {
                    unlink(__DIR__ . '/../../assets/uploads/' . $image['image_path']);
                    $stmt = $pdo->prepare("DELETE FROM art_images WHERE id = ? AND art_id = ?");
                    $stmt->execute([$image_id, $id]);
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Art</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/sidebar.php'; ?>
    <div class="content">
        <h2>Edit Art</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
            <div>
                <label>Title</label>
                <input type="text" name="title" value="<?php echo $art['title']; ?>" required>
            </div>
            <div>
                <label>Meta Description</label>
                <textarea name="meta_description" required><?php echo $art['meta_description']; ?></textarea>
            </div>
            <div>
                <label>Category</label>
                <select name="category_id" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>" <?php echo $category['id'] == $art['category_id'] ? 'selected' : ''; ?>>
                            <?php echo $category['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label>Price</label>
                <input type="number" name="price" step="0.01" value="<?php echo $art['price']; ?>" required>
            </div>
            <div>
                <label>Description</label>
                <textarea name="description" id="editor"><?php echo $art['description']; ?></textarea>
            </div>
            
            <div>
                <label>Current Main Image</label>
                <img src="../../assets/uploads/<?php echo $art['main_image']; ?>" alt="<?php echo $art['title']; ?>" width="100">
            </div>
            <div>
                <label>New Main Image (Optional)</label>
                <input type="file" name="main_image" accept="image/*">
            </div>
            <div>
                <label>Current Main Image 2</label>
                <img src="../../assets/uploads/<?php echo $art['main_image_2']; ?>" alt="<?php echo $art['title']; ?>" width="100">
            </div>
            <div>
                <label>New Main Image 2 (Optional)</label>
                <input type="file" name="main_image_2" accept="image/*">
            </div>
            <div>
                <label>Gallery Images</label>
                <div class="gallery-grid">
                    <?php foreach ($gallery as $image): ?>
                        <div class="gallery-item">
                            <img src="../../assets/uploads/<?php echo $image['image_path']; ?>" alt="Gallery Image" width="100">
                            <label><input type="checkbox" name="delete_images[]" value="<?php echo $image['id']; ?>"> Delete</label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <input type="file" name="gallery_images[]" accept="image/*" multiple>
            </div>
            <div>
                <label>Stock</label>
                <input type="number" name="stock" min="0" value="<?php echo $art['stock']; ?>" required>
            </div>
            <div>
                <label>Status</label>
                <select name="status">
                    <option value="in_stock" <?php echo $art['status'] === 'in_stock' ? 'selected' : ''; ?>>In Stock</option>
                    <option value="sold_out" <?php echo $art['status'] === 'sold_out' ? 'selected' : ''; ?>>Sold Out</option>
                    <option value="featured" <?php echo $art['status'] === 'featured' ? 'selected' : ''; ?>>Featured</option>
                </select>
            </div>
            <button type="submit">Update Art</button>
        </form>
    </div>
    <script>
        CKEDITOR.replace('editor');
    </script>
    <?php include '../includes/footer.php'; ?>
</body>
</html>