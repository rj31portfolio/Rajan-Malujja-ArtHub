<?php
require_once '../../includes/functions.php';
require_once '../../includes/db.php';

if (!isAdmin()) {
    redirect('../login.php');
}

$id = $_GET['id'] ?? 0;

try {
    // Start a transaction
    $pdo->beginTransaction();

    // Delete associated gallery images (if any)
    $stmt = $pdo->prepare("SELECT image_path FROM art_images WHERE art_id = ?");
    $stmt->execute([$id]);
    $images = $stmt->fetchAll();
    foreach ($images as $image) {
        $imagePath = __DIR__ . '/../../assets/uploads/' . $image['image_path'];
        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete the image file
        }
    }
    $stmt = $pdo->prepare("DELETE FROM art_images WHERE art_id = ?");
    $stmt->execute([$id]);

    // Delete the main images
    $stmt = $pdo->prepare("SELECT main_image, main_image_2 FROM arts WHERE id = ?");
    $stmt->execute([$id]);
    $art = $stmt->fetch();
    if ($art) {
        $mainImagePath = __DIR__ . '/../../assets/uploads/' . $art['main_image'];
        $mainImage2Path = __DIR__ . '/../../assets/uploads/' . $art['main_image_2'];
        if (file_exists($mainImagePath)) {
            unlink($mainImagePath); // Delete main image
        }
        if (file_exists($mainImage2Path)) {
            unlink($mainImage2Path); // Delete main image 2
        }
    }

    // Delete the art record
    $stmt = $pdo->prepare("DELETE FROM arts WHERE id = ?");
    $stmt->execute([$id]);

    // Commit the transaction
    $pdo->commit();
    redirect('list.php');
} catch (Exception $e) {
    // Rollback the transaction on error
    $pdo->rollBack();
    $_SESSION['error'] = "Failed to delete art: " . $e->getMessage();
    redirect('list.php');
}
?>