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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_cart'])) {
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
    } elseif (isset($_POST['remove_item'])) {
        $cart_id = $_POST['cart_id'];
        $stmt = $pdo->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
        $stmt->execute([$cart_id, $user_id]);
        redirect('cart.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .cart-table th, .cart-table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        .cart-table th {
            background-color: #007bff;
            color: #fff;
        }
        .cart-table img {
            border-radius: 5px;
        }
        .cart-table input[type="number"] {
            width: 60px;
            padding: 5px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            transition: all 0.3s ease;
        }
        .btn:hover {
            background-color: #218838;
        }
        .remove-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .remove-btn:hover {
            background-color: #a71d2a;
        }
        .total {
            text-align: right;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
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
                            <td><img src="assets/uploads/<?php echo htmlspecialchars($item['main_image']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" width="50"></td>
                            <td><?php echo htmlspecialchars($item['title']); ?></td>
                            <td>$<?php echo number_format($item['price'], 2); ?></td>
                            <td><input type="number" name="quantity[<?php echo $item['id']; ?>]" value="<?php echo $item['quantity']; ?>" min="0"></td>
                            <td>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                            <td>
                                <button type="submit" name="remove_item" class="remove-btn" value="Remove">Remove</button>
                                <input type="hidden" name="cart_id" value="<?php echo $item['id']; ?>">
                            </td>
                        </tr>
                        <?php $total += $item['price'] * $item['quantity']; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="total">Total: $<?php echo number_format($total, 2); ?></div>
            <div style="text-align: right; margin-top: 20px;">
                <button type="submit" name="update_cart" class="btn">Update Cart</button>
                <a href="checkout.php" class="btn">Proceed to Checkout</a>
            </div>
        </form>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>