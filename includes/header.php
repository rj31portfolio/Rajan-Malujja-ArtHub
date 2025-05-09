<?php
require_once __DIR__ . '/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artify Hub</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">

    <style>
        .navbar-dark .navbar-nav .nav-link {
            color: #ffffff;
            transition: color 0.3s;
        }
        .navbar-dark .navbar-nav .nav-link:hover {
            color: #ffc107;
        }
        .navbar-brand img {
            height: 50px;
        }
        .nav-item .dropdown-menu {
            background-color: #212529;
        }
        .nav-item .dropdown-menu a {
            color: #fff;
        }
        .nav-item .dropdown-menu a:hover {
            background-color: #343a40;
        }
    </style>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="<?php echo BASE_URL; ?>index.php">
                <img src="<?php echo BASE_URL; ?>assets/images/logo.png" alt="Artify Hub">
                <span class="ms-2 fw-bold">Artify Hub</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-2">
                    <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>index.php"><i class="bi bi-house-door"></i> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>art-listing.php"><i class="bi bi-brush"></i> Arts</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>celebrity-gallery.php"><i class="bi bi-stars"></i> Celebrity</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>event-gallery.php"><i class="bi bi-calendar-event"></i> Events</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>media-gallery.php"><i class="bi bi-camera-reels"></i> Media</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>contact.php"><i class="bi bi-envelope"></i> Contact</a></li>

                    <?php if (isLoggedIn()): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i> My Account
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>cart.php"><i class="bi bi-cart4"></i> Cart</a></li>
                                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>wishlist.php"><i class="bi bi-heart"></i> Wishlist</a></li>
                                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>order-history.php"><i class="bi bi-clock-history"></i> Orders</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="<?php echo BASE_URL; ?>logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>login.php"><i class="bi bi-box-arrow-in-right"></i> Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>register.php"><i class="bi bi-person-plus"></i> Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="container mt-4">
