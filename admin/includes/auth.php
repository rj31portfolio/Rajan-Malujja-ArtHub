<?php
require_once __DIR__ . '/../../includes/functions.php';

if (!isAdmin()) {
    redirect(ADMIN_URL . 'login.php');
}
?>