<?php
require_once '../../includes/functions.php';
require_once '../../includes/db.php';

if (!isAdmin()) {
    redirect('../login.php');
}

$orders = $pdo->query("SELECT o.*, u.name as customer_name FROM orders o JOIN users u ON o.user_id = u.id")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .content {
            margin-left: 250px; /* Adjust this value to match your sidebar width */
            padding: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table-actions a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/sidebar.php'; ?>
    <div class="content">
        <div class="container mt-5">
            <h2 class="mb-4">Orders</h2>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Payment Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                            <td>$<?php echo number_format($order['total_amount'], 2); ?></td>
                            <td>
                                <span class="badge bg-<?php echo $order['status'] === 'completed' ? 'success' : 'warning'; ?>">
                                    <?php echo ucfirst($order['status']); ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-<?php echo $order['payment_status'] === 'paid' ? 'success' : 'danger'; ?>">
                                    <?php echo ucfirst($order['payment_status']); ?>
                                </span>
                            </td>
                            <td class="table-actions">
                                <a href="view.php?id=<?php echo $order['id']; ?>" class="btn btn-primary btn-sm">View</a>
                                <a href="edit.php?id=<?php echo $order['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete.php?id=<?php echo $order['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include '../includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>