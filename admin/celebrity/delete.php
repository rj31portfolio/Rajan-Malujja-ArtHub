<?php
require_once '../../includes/functions.php';
require_once '../../includes/db.php';

if (!isAdmin()) {
    redirect('../login.php');
}

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT image_path FROM celebrity_photos WHERE id = ?");
$stmt->execute([$id]);
$photo = $stmt->fetch();

if ($photo) {
    unlink(__DIR__ . '/../../assets/uploads/' . $photo['image_path']);
    $stmt = $pdo->prepare("DELETE FROM celebrity_photos WHERE id = ?");
    $stmt->execute([$id]);
}
redirect('list.php');
?>