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
        .content {
            margin-left: 250px; /* Adjust this value to match your sidebar width */
            padding: 20px;
        }
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
            <h1 class="text-center mb-4">Media Videos</h1>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="add.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add New Video</a>
                <div>
                    <span class="view-toggle btn btn-outline-secondary" data-view="grid">Grid View</span>
                    <span class="view-toggle btn btn-outline-secondary" data-view="list">List View</span>
                </div>
            </div>

            <!-- Grid View -->
            <div id="grid-view" class="row">
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

            <!-- List View -->
            <div id="list-view" class="d-none">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Caption</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($media as $index => $item): ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo htmlspecialchars($item['caption']) ?: 'No caption'; ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $item['id']; ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                    <a href="delete.php?id=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i> Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
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