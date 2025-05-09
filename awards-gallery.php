<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';

// Fetch all awards
$awards = $pdo->query("SELECT * FROM awards ORDER BY created_at DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awards Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .gallery-item {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            width: 200px;
            text-align: center;
        }
        .gallery-item img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .gallery-item h3 {
            font-size: 16px;
            margin: 10px 0 0;
        }
    </style>
</head>
<body>
    <h1>Awards Gallery</h1>
    <div class="gallery">
        <?php foreach ($awards as $award): ?>
            <div class="gallery-item">
                <img src="/artifyhub/assets/uploads/awards/<?php echo htmlspecialchars($award['image_path']); ?>" alt="<?php echo htmlspecialchars($award['title']); ?>">
                <h3><?php echo htmlspecialchars($award['title']); ?></h3>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>