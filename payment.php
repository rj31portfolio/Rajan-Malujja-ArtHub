<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';

if (!isLoggedIn()) {
    redirect('login.php');
}

// Fetch cart items to display total
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT c.*, a.price FROM cart c JOIN arts a ON c.art_id = a.id WHERE c.user_id = ?");
$stmt->execute([$user_id]);
$cart_items = $stmt->fetchAll();

if (empty($cart_items)) {
    redirect('cart.php');
}

$total_amount = 0;
foreach ($cart_items as $item) {
    $total_amount += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Complete Your Payment</h2>
        <p>Total Amount: $<?php echo number_format($total_amount, 2); ?></p>
        <button id="rzp-button" class="btn">Pay Now</button>
    </div>
    <?php include 'includes/footer.php'; ?>
    
    <script>
        console.log('Razorpay script loaded');
        document.getElementById('rzp-button').onclick = function(e) {
            console.log('Pay Now button clicked');
            fetch('create-razorpay-order.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('Order response:', data);
                if (data.error) {
                    alert('Error creating order: ' + data.message);
                    return;
                }
                var options = {
                    "key": data.key,
                    "amount": data.amount,
                    "currency": data.currency,
                    "name": "Artify Hub",
                    "description": "Order Payment",
                    "image": "<?php echo BASE_URL; ?>assets/images/logo.png",
                    "order_id": data.order_id,
                    "handler": function(response) {
                        console.log('Payment response:', response);
                        fetch('verify-payment.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                razorpay_payment_id: response.razorpay_payment_id,
                                razorpay_order_id: response.razorpay_order_id,
                                razorpay_signature: response.razorpay_signature
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log('Verification response:', data);
                            if (data.status === 'success') {
                                window.location.href = 'order-success.php';
                            } else {
                                window.location.href = 'order-failed.php';
                            }
                        })
                        .catch(error => {
                            console.error('Verification error:', error);
                            window.location.href = 'order-failed.php';
                        });
                    },
                    "prefill": {
                        "name": "<?php echo $_SESSION['user_name']; ?>",
                        "email": "<?php echo $_SESSION['user_email']; ?>"
                    },
                    "theme": {
                        "color": "#333"
                    }
                };
                console.log('Razorpay options:', options);
                var rzp = new Razorpay(options);
                rzp.open();
            })
            .catch(error => {
                console.error('Order creation error:', error);
                alert('Failed to initiate payment');
            });
            e.preventDefault();
        };
    </script>
</body>
</html>