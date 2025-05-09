<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';

if (!isLoggedIn()) {
    redirect('login.php');
}

// Fetch the latest order for the user
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC LIMIT 1");
$stmt->execute([$user_id]);
$order = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Successful</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Order Successful!</h2>
        <p>Thank you for your purchase. Your order has been placed successfully.</p>
        <?php if ($order): ?>
            <p>Order ID: <?php echo $order['id']; ?></p>
            <p>Total Amount: $<?php echo $order['total_amount']; ?></p>
            <p>Status: <?php echo ucfirst($order['status']); ?></p>
        <?php endif; ?>
        <a href="order-history.php" class="btn">View Order History</a>
        <a href="index.php" class="btn">Continue Shopping</a>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>