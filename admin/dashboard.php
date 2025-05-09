<?php
require_once '../includes/functions.php';
require_once '../includes/db.php';

if (!isAdmin()) {
    redirect('login.php');
}

$stats = [
    'arts' => $pdo->query("SELECT COUNT(*) FROM arts")->fetchColumn(),
    'orders' => $pdo->query("SELECT COUNT(*) FROM orders")->fetchColumn(),
    'categories' => $pdo->query("SELECT COUNT(*) FROM categories")->fetchColumn(),
    'customers' => $pdo->query("SELECT COUNT(*) FROM users WHERE role = 'customer'")->fetchColumn(),
    'inquiries' => $pdo->query("SELECT COUNT(*) FROM enquiries")->fetchColumn(),

];

$inquiries = $pdo->query("SELECT name, email, message, submitted_at FROM enquiries ORDER BY submitted_at DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Artify Hub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background-color: #f4f6f9;
        }

        .admin-layout {
            display: flex;
        }

        .sidebar {
            width: 220px;
            background-color: #343a40;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed {
            width: 60px;
        }

        .sidebar ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar ul li a {
            display: block;
            color: #fff;
            padding: 12px 20px;
            text-decoration: none;
            white-space: nowrap;
        }

        .sidebar ul li a i {
            margin-right: 10px;
        }

        .sidebar.collapsed ul li a span {
            display: none;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .toggle-btn {
            background: #343a40;
            color: #fff;
            border: none;
            font-size: 20px;
            padding: 10px 15px;
            cursor: pointer;
        }

        .dashboard-title {
            margin-bottom: 30px;
            font-weight: bold;
        }

        .card {
            border-radius: 1rem;
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-body {
            text-align: center;
        }

        .card-body i {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .card h5 {
            margin-bottom: 10px;
            font-weight: 600;
        }

        .card h2 {
            font-size: 2.2rem;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="admin-layout">
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <ul>
            <li><a href="#"><i class="bi bi-list toggle-btn" id="toggleSidebar"></i><span> Menu</span></a></li>
            <li><a href="<?php echo ADMIN_URL; ?>dashboard.php"><i class="bi bi-speedometer2"></i><span> Dashboard</span></a></li>
            <li><a href="<?php echo ADMIN_URL; ?>arts/list.php"><i class="bi bi-brush"></i><span> Arts</span></a></li>
            <li><a href="<?php echo ADMIN_URL; ?>categories/list.php"><i class="bi bi-tags"></i><span> Categories</span></a></li>
            <li><a href="<?php echo ADMIN_URL; ?>orders/list.php"><i class="bi bi-cart-check"></i><span> Orders</span></a></li>
            <li><a href="<?php echo ADMIN_URL; ?>celebrity/list.php"><i class="bi bi-star"></i><span> Celebrity</span></a></li>
            <li><a href="<?php echo ADMIN_URL; ?>events/list.php"><i class="bi bi-calendar-event"></i><span> Events</span></a></li>
            <li><a href="<?php echo ADMIN_URL; ?>media/list.php"><i class="bi bi-image"></i><span> Media</span></a></li>
            <li><a href="<?php echo ADMIN_URL; ?>inquiries.php"><i class="bi bi-envelope"></i><span> Inquiries</span></a></li>

            <li><a href="<?php echo ADMIN_URL; ?>logout.php"><i class="bi bi-box-arrow-right"></i><span> Logout</span></a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <h2 class="dashboard-title text-primary text-center">Admin Dashboard</h2>

        <div class="row g-4">
            <div class="col-sm-6 col-lg-3">
                <div class="card text-bg-primary shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-brush"></i>
                        <h5>Total Arts</h5>
                        <h2><?php echo $stats['arts']; ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card text-bg-success shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-cart-check"></i>
                        <h5>Total Orders</h5>
                        <h2><?php echo $stats['orders']; ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card text-bg-warning shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-tags"></i>
                        <h5>Total Categories</h5>
                        <h2><?php echo $stats['categories']; ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card text-bg-danger shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-people"></i>
                        <h5>Total Customers</h5>
                        <h2><?php echo $stats['customers']; ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card text-bg-info shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-chat-left-dots"></i>
                        <h5>Total Inquiries</h5>
                        <h2><?php echo $stats['inquiries']; ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest Inquiries Table -->
        <h4 class="mt-5 mb-3 text-secondary">Recent Inquiries</h4>
        <div class="table-responsive">
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inquiries as $inquiry): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($inquiry['name']); ?></td>
                            <td><?php echo htmlspecialchars($inquiry['email']); ?></td>
                            <td><?php echo htmlspecialchars(substr($inquiry['message'], 0, 50)) . '...'; ?></td>
                            <td><?php echo date('d M Y', strtotime($inquiry['submitted_at'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Toggle Sidebar Script -->
<script>
    document.getElementById('toggleSidebar').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('collapsed');
    });
</script>

</body>
</html>
