<?php
require_once '../includes/functions.php';
require_once '../includes/db.php';

if (!isAdmin()) {
    redirect('login.php');
}

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM enquiries WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}

header("Location: inquiries.php?deleted=1");
exit;
