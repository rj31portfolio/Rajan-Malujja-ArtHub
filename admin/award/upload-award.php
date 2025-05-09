<?php
require_once '../../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $image = $_FILES['image'] ?? null;

    if (!empty($title) && $image && $image['error'] === 0) {
        $uploadDir = '../../assets/uploads/awards/';
        $imagePath = $uploadDir . basename($image['name']);

        // Move uploaded file
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            $stmt = $pdo->prepare("INSERT INTO awards (image_path, title) VALUES (?, ?)");
            $stmt->execute([basename($image['name']), $title]);
            $successMessage = "Award uploaded successfully!";
        } else {
            $errorMessage = "Failed to upload image.";
        }
    } else {
        $errorMessage = "Please provide a title and a valid image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Award</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Upload New Award</h1>

        <!-- Display Success or Error Messages -->
        <?php if (!empty($successMessage)): ?>
            <div class="alert alert-success text-center"><?php echo $successMessage; ?></div>
        <?php elseif (!empty($errorMessage)): ?>
            <div class="alert alert-danger text-center"><?php echo $errorMessage; ?></div>
        <?php endif; ?>

        <div class="card shadow p-4">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Award Title:</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter award title" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Award Image:</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-upload"></i> Upload Award</button>
                    <a href="list-awards.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>