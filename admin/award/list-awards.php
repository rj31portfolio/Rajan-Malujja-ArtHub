<?php
require_once '../includes/db.php';

// Fetch all awards
$awards = $pdo->query("SELECT * FROM awards ORDER BY created_at DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Awards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Manage Awards</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="upload-award.php" class="btn btn-primary"><i class="bi bi-upload"></i> Upload New Award</a>
        </div>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($awards as $award): ?>
                    <tr>
                        <td><?php echo $award['id']; ?></td>
                        <td>
                            <img src="/artifyhub/assets/uploads/awards/<?php echo htmlspecialchars($award['image_path']); ?>" alt="<?php echo htmlspecialchars($award['title']); ?>" style="height: 50px;" class="img-thumbnail">
                        </td>
                        <td><?php echo htmlspecialchars($award['title']); ?></td>
                        <td>
                            <a href="edit-award.php?id=<?php echo $award['id']; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                            <a href="delete-award.php?id=<?php echo $award['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this award?');"><i class="bi bi-trash"></i> Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>