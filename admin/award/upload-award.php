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
            echo "Award uploaded successfully!";
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "Please provide a title and a valid image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Award</title>
</head>
<body>
    <h1>Upload New Award</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="title">Award Title:</label>
        <input type="text" name="title" id="title" required>
        <br><br>
        <label for="image">Award Image:</label>
        <input type="file" name="image" id="image" accept="image/*" required>
        <br><br>
        <button type="submit">Upload Award</button>
    </form>
</body>
</html>