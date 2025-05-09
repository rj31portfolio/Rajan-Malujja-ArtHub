<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data || !isset($data['razorpay_payment_id'], $data['razorpay_order_id'], $data['razorpay_signature'])) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid payment data']);
    exit;
}

$razorpay_payment_id = $data['razorpay_payment_id'];
$razorpay_order_id = $data['razorpay_order_id'];
$razorpay_signature = $data['razorpay_signature'];

// Verify session data
if (!isset($_SESSION['razorpay_order_id']) || $_SESSION['razorpay_order_id'] !== $razorpay_order_id) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid order ID']);
    exit;
}

// Verify signature
$generated_signature = hash_hmac('sha256', $razorpay_order_id . '|' . $razorpay_payment_id, RAZORPAY_KEY_SECRET);

if ($generated_signature === $razorpay_signature) {
    // Payment is verified, save order to database
    $pdo->beginTransaction();
    try {
        // Insert order
        $stmt = $pdo->prepare("INSERT INTO orders (user_id, total_amount, razorpay_order_id, razorpay_payment_id, status, payment_status) VALUES (?, ?, ?, ?, 'pending', 'completed')");
        $stmt->execute([$_SESSION['user_id'], $_SESSION['total_amount'], $razorpay_order_id, $razorpay_payment_id]);
        $order_id = $pdo->lastInsertId();

        // Insert order items
        foreach ($_SESSION['cart'] as $art_id => $item) {
            $stmt = $pdo->prepare("INSERT INTO order_items (order_id, art_id, quantity, price) VALUES (?, ?, ?, ?)");
            $stmt->execute([$order_id, $art_id, $item['quantity'], $item['price']]);
            
            // Update stock
            $stmt = $pdo->prepare("UPDATE arts SET stock = stock - ? WHERE id = ?");
            $stmt->execute([$item['quantity'], $art_id]);
        }

        // Clear cart
        $_SESSION['cart'] = [];
        unset($_SESSION['razorpay_order_id']);
        unset($_SESSION['total_amount']);

        $pdo->commit();
        echo json_encode(['status' => 'success']);
    } catch (Exception $e) {
        $pdo->rollBack();
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid signature']);
}
?>