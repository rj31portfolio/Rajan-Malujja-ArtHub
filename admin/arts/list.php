<?php
require_once '../../includes/functions.php';
require_once '../../includes/db.php';

if (!isAdmin()) {
    redirect('../login.php');
}

$arts = $pdo->query("SELECT a.*, c.name as category_name FROM arts a LEFT JOIN categories c ON a.category_id = c.id")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art List</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .content {
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        .btn {
            display: inline-block;
            padding: 12px 20px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 25px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .btn:hover {
            background-color: #218838;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        table thead {
            background-color: #007bff;
            color: #fff;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            font-weight: bold;
        }
        table tbody tr:hover {
            background-color: #f1f1f1;
        }
        table img {
            border-radius: 5px;
        }
        .actions a {
            display: inline-block;
            padding: 8px 12px;
            font-size: 12px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        .actions a.edit {
            background-color: #007bff;
            color: #fff;
        }
        .actions a.edit:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        .actions a.delete {
            background-color: #dc3545;
            color: #fff;
        }
        .actions a.delete:hover {
            background-color: #a71d2a;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/sidebar.php'; ?>
    <div class="content">
        <h2>Arts</h2>
        <a href="add.php" class="btn">Add New Art</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($arts as $art): ?>
                    <tr>
                        <td><?php echo $art['id']; ?></td>
                        <td><?php echo htmlspecialchars($art['title']); ?></td>
                        <td><?php echo htmlspecialchars($art['category_name'] ?: 'N/A'); ?></td>
                        <td>$<?php echo number_format($art['price'], 2); ?></td>
                        <td><?php echo $art['stock']; ?></td>
                        <td><?php echo ucfirst($art['status']); ?></td>
                        <td>
                            <img src="../../assets/uploads/<?php echo htmlspecialchars($art['main_image']); ?>" alt="<?php echo htmlspecialchars($art['title']); ?>" width="50">
                        </td>
                        <td class="actions">
                            <a href="edit.php?id=<?php echo $art['id']; ?>" class="edit">Edit</a>
                            <a href="delete.php?id=<?php echo $art['id']; ?>" class="delete" onclick="return confirm('Are you sure you want to delete this art?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>