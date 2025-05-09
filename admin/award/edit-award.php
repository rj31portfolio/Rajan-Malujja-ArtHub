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

        echo "Award updated successfully!";
        header('Location: list-awards.php');
        exit;
    } else {
        echo "Title is required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Award</title>
</head>
<body>
    <h1>Edit Award</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="title">Award Title:</label>
        <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($award['title']); ?>" required>
        <br><br>
        <label for="image">Award Image (Leave blank to keep current image):</label>
        <input type="file" name="image" id="image" accept="image/*">
        <br><br>
        <button type="submit">Update Award</button>
    </form>
</body>
</html>