<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';

if (isLoggedIn()) {
    redirect('index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND role = 'customer'");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        redirect('index.php');
    } else {
        $error = "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Artify Hub</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .form-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-container .form-group {
            margin-bottom: 20px;
        }

        .form-container input {
            border-radius: 4px;
            box-shadow: none;
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border: 1px solid #ddd;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        .form-container .error {
            color: #dc3545;
            font-size: 14px;
            text-align: center;
            margin-bottom: 15px;
        }

        .form-container .form-group i {
            position: absolute;
            padding: 12px;
            font-size: 18px;
            color: #6c757d;
        }

        .form-group input {
            padding-left: 35px;
        }
    </style>
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="container mt-5">
    <div class="form-container">
        <h2>Login to Artify Hub</h2>

        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group position-relative">
                <label for="email"><i class="bi bi-envelope-fill"></i> Email Address</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="form-group position-relative">
                <label for="password"><i class="bi bi-lock-fill"></i> Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <button type="submit">Login</button>

            <p class="text-center mt-3">Don't have an account? <a href="register.php">Register here</a></p>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
