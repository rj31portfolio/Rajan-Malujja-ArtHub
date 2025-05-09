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
        .content {
            margin-left: 250px; /* Adjust this value to match your sidebar width */
            padding: 20px;
        }
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0; /* Remove margin for smaller screens */
            }
        }
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
        .list-view table {
            width: 100%;
        }
        .view-toggle {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/sidebar.php'; ?>
    <div class="content">
        <div class="container mt-5">
            <h1 class="text-center mb-4">Celebrity Photos</h1>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="add.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add New Photo</a>
                <div>
                    <span class="view-toggle btn btn-outline-secondary" data-view="grid">Grid View</span>
                    <span class="view-toggle btn btn-outline-secondary" data-view="list">List View</span>
                </div>
            </div>

            <!-- Grid View -->
            <div id="grid-view" class="gallery-grid">
                <?php foreach ($photos as $photo): ?>
                    <div class="gallery-item">
                        <img src="../../assets/uploads/<?php echo $photo['image_path']; ?>" alt="Celebrity Photo">
                        <a href="delete.php?id=<?php echo $photo['id']; ?>" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i> Delete</a>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- List View -->
            <div id="list-view" class="list-view d-none">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($photos as $index => $photo): ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td>
                                    <img src="../../assets/uploads/<?php echo $photo['image_path']; ?>" alt="Celebrity Photo" style="width: 100px; height: auto;">
                                </td>
                                <td>
                                    <a href="delete.php?id=<?php echo $photo['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i> Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    
    <?php include '../includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle between grid and list views
        document.querySelectorAll('.view-toggle').forEach(button => {
            button.addEventListener('click', () => {
                const view = button.getAttribute('data-view');
                document.getElementById('grid-view').classList.toggle('d-none', view !== 'grid');
                document.getElementById('list-view').classList.toggle('d-none', view !== 'list');
            });
        });
    </script>
</body>
</html>