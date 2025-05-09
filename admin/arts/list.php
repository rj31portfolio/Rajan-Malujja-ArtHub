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
                        <td><?php echo $art['title']; ?></td>
                        <td><?php echo $art['category_name'] ?: 'N/A'; ?></td>
                        <td>$<?php echo $art['price']; ?></td>
                        <td><?php echo $art['stock']; ?></td>
                        <td><?php echo ucfirst($art['status']); ?></td>
                        <td><img src="../../assets/uploads/<?php echo $art['main_image']; ?>" alt="<?php echo $art['title']; ?>" width="50"></td>
                        <td>
                            <a href="edit.php?id=<?php echo $art['id']; ?>">Edit</a>
                            <a href="delete.php?id=<?php echo $art['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>