<?php
require_once '../../includes/functions.php';
require_once '../../includes/db.php';

if (!isAdmin()) {
    redirect('../login.php');
}

$media = $pdo->query("SELECT * FROM media_images")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Videos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            height: 100%;
        }
        .embed-responsive {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            overflow: hidden;
        }
        .embed-responsive iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/sidebar.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Media Videos</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="add.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add New Video</a>
        </div>
        <div class="row">
            <?php foreach ($media as $item): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <div class="embed-responsive mb-3">
                                <?php echo $item['embed_code']; ?>
                            </div>
                            <h5 class="card-title text-center"><?php echo htmlspecialchars($item['caption']) ?: 'No caption'; ?></h5>
                            <div class="mt-auto d-flex justify-content-between">
                                <a href="edit.php?id=<?php echo $item['id']; ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                <a href="delete.php?id=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include '../includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>