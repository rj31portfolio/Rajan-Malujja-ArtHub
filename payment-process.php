<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';

header('Content-Type: application/json');

if (!isLoggedIn()) {
    echo json_encode(['error' => true, 'message' => 'Not logged in']);
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT c.*, a.price FROM cart c JOIN arts a ON c.art_id = a.id WHERE c.user_id = ?");
$stmt->execute([$user_id]);
$cart_items = $stmt->fetchAll();

if (empty($cart_items)) {
    echo json_encode(['error' => true, 'message' => 'Cart is empty']);
    exit;
}

$total_amount = 0;
foreach ($cart_items as $item) {
    $total_amount += $item['price'] * $item['quantity'];
}

// Create Razorpay order via API
$order_data = [
    'amount' => $total_amount * 100, // Amount in paise
    'currency' => 'INR',
    'payment_capture' => 1
];

$response = makeCurlRequest('https://api.razorpay.com/v1/orders', 'POST', $order_data, RAZORPAY_KEY_ID, RAZORPAY_KEY_SECRET);

// Log the response
file_put_contents('razorpay_log.txt', date('Y-m-d H:i:s') . ' - Order Creation Response: ' . json_encode($response) . PHP_EOL, FILE_APPEND);

if (isset($response['id'])) {
    $razorpay_order_id = $response['id'];
    
    // Store order in database
    $pdo->beginTransaction();
    try {
        $stmt = $pdo->prepare("INSERT INTO orders (user_id, total_amount, razorpay_order_id, status, payment_status) VALUES (?, ?, ?, 'pending', 'pending')");
        $stmt->execute([$user_id, $total_amount, $razorpay_order_id]);
        $order_id = $pdo->lastInsertId();

        // Store order items
        foreach ($cart_items as $item) {
            $stmt = $pdo->prepare("INSERT INTO order_items (order_id, art_id, quantity, price) VALUES (?, ?, ?, ?)");
            $stmt->execute([$order_id, $item['art_id'], $item['quantity'], $item['price']]);
        }

        $pdo->commit();

        echo json_encode([
            'order_id' => $razorpay_order_id,
            'amount' => $total_amount * 100,
            'currency' => 'INR',
            'key' => RAZORPAY_KEY_ID
        ]);
    } catch (Exception $e) {
        $pdo->rollBack();
        echo json_encode(['error' => true, 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => true, 'message' => $response['message'] ?? 'Unknown error']);
}
?>