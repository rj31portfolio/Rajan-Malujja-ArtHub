<?php
require_once '../../includes/functions.php';
require_once '../../includes/db.php';

if (!isAdmin()) {
    redirect('../login.php');
}

$events = $pdo->query("SELECT * FROM event_images")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Images</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <style>
        /* Additional styles for better appearance */
        .content {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .content h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .gallery-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .gallery-item img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .gallery-item p {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        .gallery-item a {
            display: inline-block;
            margin: 5px;
            padding: 5px 10px;
            font-size: 14px;
            color: #fff;
            background-color: #28a745;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .gallery-item a:hover {
            background-color: #218838;
        }

        .gallery-item a:nth-child(3) {
            background-color: #dc3545;
        }

        .gallery-item a:nth-child(3):hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/sidebar.php'; ?>
    <div class="content">
        <h2>Event Images</h2>
        <a href="add.php" class="btn">Add New Image</a>
        <div class="gallery-grid">
            <?php foreach ($events as $event): ?>
                <div class="gallery-item">
                    <img src="../../assets/uploads/<?php echo $event['image_path']; ?>" alt="<?php echo $event['title']; ?>">
                    <p><?php echo $event['title']; ?></p>
                    <a href="edit.php?id=<?php echo $event['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $event['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>