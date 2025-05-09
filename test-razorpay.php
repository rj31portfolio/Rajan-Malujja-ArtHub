<?php
define('RAZORPAY_KEY_ID', 'rzp_test_Y2wy8t1wD1AFaA');
require_once 'includes/functions.php';

// Simulate a fixed amount
$total_amount = 500.00; // $5.00

// Create Razorpay order
$order_data = [
    'amount' => $total_amount * 100,
    'currency' => 'INR',
    'payment_capture' => 1
];

$response = makeCurlRequest('https://api.razorpay.com/v1/orders', 'POST', $order_data, RAZORPAY_KEY_ID, 'your_key_secret');
if (!isset($response['id'])) {
    die('Error: ' . ($response['message'] ?? 'Unknown error'));
}
$razorpay_order_id = $response['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Razorpay</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <h2>Test Payment</h2>
    <p>Amount: $<?php echo number_format($total_amount, 2); ?></p>
    <button id="rzp-button">Pay Now</button>
    
    <script>
        console.log('Razorpay script loaded');
        var options = {
            "key": "<?php echo RAZORPAY_KEY_ID; ?>",
            "amount": "<?php echo $total_amount * 100; ?>",
            "currency": "INR",
            "name": "Test Payment",
            "description": "Test Transaction",
            "order_id": "<?php echo $razorpay_order_id; ?>",
            "handler": function(response) {
                console.log('Payment response:', response);
                alert('Payment successful: ' + response.razorpay_payment_id);
            },
            "theme": {
                "color": "#333"
            }
        };
        console.log('Options:', options);
        var rzp = new Razorpay(options);
        document.getElementById('rzp-button').onclick = function(e) {
            console.log('Button clicked');
            rzp.open();
            e.preventDefault();
        };
    </script>
</body>
</html>