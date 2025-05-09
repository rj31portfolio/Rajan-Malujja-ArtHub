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

// Delete the award image file
$uploadDir = '../assets/uploads/awards/';
unlink($uploadDir . $award['image_path']);

// Delete the award from the database
$stmt = $pdo->prepare("DELETE FROM awards WHERE id = ?");
$stmt->execute([$id]);

header('Location: list-awards.php');
exit;