<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';

if (!isLoggedIn()) {
    redirect('login.php');
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT c.*, a.title, a.price FROM cart c JOIN arts a ON c.art_id = a.id WHERE c.user_id = ?");
$stmt->execute([$user_id]);
$cart_items = $stmt->fetchAll();

$total = 0;
foreach ($cart_items as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
        .btn-small {
            padding: 5px 10px;
            font-size: 14px;
            cursor: pointer;
        }
        .cart-table input[type="number"] {
            width: 60px;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Checkout</h2>

        <form action="update-cart.php" method="post">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_items as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['title']); ?></td>
                            <td>$<?php echo number_format($item['price'], 2); ?></td>
                            <td>
                                <input type="number" name="quantities[<?php echo $item['id']; ?>]" value="<?php echo $item['quantity']; ?>" min="1">
                            </td>
                            <td>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                            <td>
                                <button type="submit" class="btn-small">Update</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </form>

        <h3>Total: $<?php echo number_format($total, 2); ?></h3>

        <button id="rzp-button" class="btn">Pay Now</button>
    </div>

    <script>
        document.getElementById('rzp-button').onclick = function(e) {
            fetch('create-razorpay-order.php')
                .then(response => response.json())
                .then(data => {
                    var options = {
                        "key": data.key,
                        "amount": data.amount,
                        "currency": data.currency,
                        "name": "Artify Hub",
                        "description": "Art Purchase",
                        "order_id": data.order_id,
                        "handler": function (response) {
                            window.location.href = `payment-process.php?razorpay_payment_id=${response.razorpay_payment_id}&razorpay_order_id=${response.razorpay_order_id}&razorpay_signature=${response.razorpay_signature}`;
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                });
            e.preventDefault();
        }
    </script>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
