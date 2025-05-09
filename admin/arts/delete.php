<?php
require_once '../../includes/functions.php';
require_once '../../includes/db.php';

if (!isAdmin()) {
    redirect('../login.php');
}

$id = $_GET['id'] ?? 0;
$pdo->beginTransaction();
try {
    // Fetch main image
    $stmt = $pdo->prepare("SELECT main_image FROM arts WHERE id = ?");
    $stmt->execute([$id]);
    $art = $stmt->fetch();
    
    if ($art) {
        // Delete main image file
        unlink(__DIR__ . '/../../assets/uploads/' . $art['main_image']);
        
        // Fetch and delete gallery images
        $stmt = $pdo->prepare("SELECT image_path FROM art_images WHERE art_id = ?");
        $stmt->execute([$id]);
        $gallery_images = $stmt->fetchAll();
        
        foreach ($gallery_images as $image) {
            unlink(__DIR__ . '/../../assets/uploads/' . $image['image_path']);
        }
        
        // Delete gallery images from database
        $stmt = $pdo->prepare("DELETE FROM art_images WHERE art_id = ?");
        $stmt->execute([$id]);
        
        // Delete art from database
        $stmt = $pdo->prepare("DELETE FROM arts WHERE id = ?");
        $stmt->execute([$id]);
        
        $pdo->commit();
    }
    redirect('list.php');
} catch (Exception $e) {
    $pdo->rollBack();
    $error = "Error: " . $e->getMessage();
    // Optionally log $error or display it
    redirect('list.php');
}
?>