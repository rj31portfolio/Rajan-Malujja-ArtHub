<?php
require_once __DIR__ . '/../../includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Artify Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .admin-header {
            background-color: #343a40;
            padding: 10px 20px;
            color: white;
        }
        .admin-header .navbar-brand img {
            height: 40px;
        }
        .admin-header .nav-link {
            color: white;
            font-weight: 500;
        }
        .admin-header .nav-link:hover {
            color: #0d6efd;
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand d-flex align-items-center" href="<?php echo ADMIN_URL; ?>dashboard.php">
                    <img src="<?php echo BASE_URL; ?>assets/images/logo.png" alt="Artify Hub Admin" class="me-2">
                    <span>Artify Hub Admin</span>
                </a>
                <div class="ms-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ADMIN_URL; ?>dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ADMIN_URL; ?>logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
