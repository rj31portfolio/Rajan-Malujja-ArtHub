<?php
require_once '../../includes/functions.php';
require_once '../../includes/db.php';

if (!isAdmin()) {
    redirect('../login.php');
}

$photos = $pdo->query("SELECT * FROM celebrity_photos")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celebrity Photos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .gallery-item img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.3s ease;
        }
        .gallery-item:hover img {
            transform: scale(1.1);
        }
        .gallery-item a {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(255, 0, 0, 0.8);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: background 0.3s ease;
        }
        .gallery-item a:hover {
            background: rgba(255, 0, 0, 1);
        }
    </style>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/sidebar.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Celebrity Photos</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="add.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add New Photo</a>
        </div>
        <div class="gallery-grid">
            <?php foreach ($photos as $photo): ?>
                <div class="gallery-item">
                    <img src="../../assets/uploads/<?php echo $photo['image_path']; ?>" alt="Celebrity Photo">
                    <a href="delete.php?id=<?php echo $photo['id']; ?>" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i> Delete</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include '../includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>