<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';

if (!isLoggedIn()) {
    redirect('login.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantities'])) {
    $user_id = $_SESSION['user_id'];

    foreach ($_POST['quantities'] as $cart_id => $quantity) {
        $quantity = (int)$quantity;

        if ($quantity > 0) {
            $stmt = $pdo->prepare("UPDATE cart SET quantity = ? WHERE id = ? AND user_id = ?");
            $stmt->execute([$quantity, $cart_id, $user_id]);
        }
    }
}

redirect('checkout.php');
