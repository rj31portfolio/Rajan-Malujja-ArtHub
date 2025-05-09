<?php
require_once 'includes/functions.php';

if (!isLoggedIn()) {
    redirect('login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Failed</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Order Failed</h2>
        <p>Sorry, your payment could not be processed. Please try again.</p>
        <a href="cart.php" class="btn">Return to Cart</a>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>