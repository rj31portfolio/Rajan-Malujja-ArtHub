<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
.sidebar {
    height: 100vh;
    background-color: #343a40;
    padding-top: 20px;
    position: fixed;
    width: 240px;
}
.sidebar ul {
    list-style: none;
    padding-left: 0;
}
.sidebar ul li {
    margin: 10px 0;
}
.sidebar ul li a {
    color: #ffffff;
    text-decoration: none;
    padding: 12px 20px;
    display: flex;
    align-items: center;
    transition: 0.3s;
}
.sidebar ul li a:hover {
    background-color: #495057;
    border-left: 4px solid #0d6efd;
    padding-left: 16px;
}
.sidebar ul li a i {
    margin-right: 10px;
}
.sidebar ul li.active a {
    background-color: #0d6efd;
    color: #fff;
    border-left: 4px solid #fff;
}
</style>

<div class="sidebar">
    <ul>
        <li><a href="<?php echo ADMIN_URL; ?>dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
        <li><a href="<?php echo ADMIN_URL; ?>arts/list.php"><i class="bi bi-brush"></i> Arts</a></li>
        <li><a href="<?php echo ADMIN_URL; ?>categories/list.php"><i class="bi bi-list-ul"></i> Categories</a></li>
        <li><a href="<?php echo ADMIN_URL; ?>orders/list.php"><i class="bi bi-bag-check"></i> Orders</a></li>
        <li><a href="<?php echo ADMIN_URL; ?>celebrity/list.php"><i class="bi bi-star-fill"></i> Celebrity Gallery</a></li>
        <li><a href="<?php echo ADMIN_URL; ?>events/list.php"><i class="bi bi-calendar-event"></i> Event Gallery</a></li>
        <li><a href="<?php echo ADMIN_URL; ?>media/list.php"><i class="bi bi-camera-reels"></i> Media Gallery</a></li>
    </ul>
</div>
