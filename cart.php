<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';

if (!isLoggedIn()) {
    redirect('login.php');
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT c.*, a.title, a.price, a.main_image FROM cart c JOIN arts a ON c.art_id = a.id WHERE c.user_id = ?");
$stmt->execute([$user_id]);
$cart_items = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
    foreach ($_POST['quantity'] as $cart_id => $quantity) {
        if ($quantity <= 0) {
            $stmt = $pdo->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
            $stmt->execute([$cart_id, $user_id]);
        } else {
            $stmt = $pdo->prepare("UPDATE cart SET quantity = ? WHERE id = ? AND user_id = ?");
            $stmt->execute([$quantity, $cart_id, $user_id]);
        }
    }
    redirect('cart.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Your Cart</h2>
        <form method="POST">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php foreach ($cart_items as $item): ?>
                        <tr>
                            <td><img src="assets/uploads/<?php echo $item['main_image']; ?>" alt="<?php echo $item['title']; ?>" width="50"></td>
                            <td><?php echo $item['title']; ?></td>
                            <td>$<?php echo $item['price']; ?></td>
                            <td><input type="number" name="quantity[<?php echo $item['id']; ?>]" value="<?php echo $item['quantity']; ?>" min="0"></td>
                            <td>$<?php echo $item['price'] * $item['quantity']; ?></td>
                            <td><button type="submit" name="update_cart">Update</button></td>
                        </tr>
                        <?php $total += $item['price'] * $item['quantity']; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h3>Total: $<?php echo $total; ?></h3>
            <a href="checkout.php" class="btn">Proceed to Checkout</a>
        </form>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>