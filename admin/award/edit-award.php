<?php
require_once '../includes/db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    die('Award ID is required.');
}

// Fetch the award
$stmt = $pdo->prepare("SELECT * FROM awards WHERE id = ?");
$stmt->execute([$id]);
$award = $stmt->fetch();

if (!$award) {
    die('Award not found.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $image = $_FILES['image'] ?? null;

    if (!empty($title)) {
        $imagePath = $award['image_path'];

        // Handle image upload if a new image is provided
        if ($image && $image['error'] === 0) {
            $uploadDir = '../assets/uploads/awards/';
            $newImagePath = $uploadDir . basename($image['name']);

            if (move_uploaded_file($image['tmp_name'], $newImagePath)) {
                $imagePath = basename($image['name']);
                // Optionally delete the old image
                unlink($uploadDir . $award['image_path']);
            }
        }

        // Update the award in the database
        $stmt = $pdo->prepare("UPDATE awards SET title = ?, image_path = ? WHERE id = ?");
        $stmt->execute([$title, $imagePath, $id]);

        echo "<div class='alert alert-success text-center'>Award updated successfully!</div>";
        header('Location: list-awards.php');
        exit;
    } else {
        echo "<div class='alert alert-danger text-center'>Title is required.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Award</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Award</h1>
        <div class="card shadow p-4">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Award Title:</label>
                    <input type="text" name="title" id="title" class="form-control" value="<?php echo htmlspecialchars($award['title']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Award Image (Leave blank to keep current image):</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Update Award</button>
                    <a href="list-awards.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>