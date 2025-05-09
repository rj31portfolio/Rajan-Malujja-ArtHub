<?php
require_once '../../includes/functions.php';
require_once '../../includes/db.php';

if (!isAdmin()) {
    redirect('../login.php');
}

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT image_path FROM event_images WHERE id = ?");
$stmt->execute([$id]);
$event = $stmt->fetch();

if ($event) {
    unlink(__DIR__ . '/../../assets/uploads/' . $event['image_path']);
    $stmt = $pdo->prepare("DELETE FROM event_images WHERE id = ?");
    $stmt->execute([$id]);
}
redirect('list.php');
?>