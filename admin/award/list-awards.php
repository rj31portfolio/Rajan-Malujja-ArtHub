<?php
require_once '../includes/db.php';

// Fetch all awards
$awards = $pdo->query("SELECT * FROM awards ORDER BY created_at DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Awards</title>
</head>
<body>
    <h1>Manage Awards</h1>
    <a href="upload-award.php">Upload New Award</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($awards as $award): ?>
                <tr>
                    <td><?php echo $award['id']; ?></td>
                    <td>
                        <img src="/artifyhub/assets/uploads/awards/<?php echo htmlspecialchars($award['image_path']); ?>" alt="<?php echo htmlspecialchars($award['title']); ?>" style="height: 50px;">
                    </td>
                    <td><?php echo htmlspecialchars($award['title']); ?></td>
                    <td>
                        <a href="edit-award.php?id=<?php echo $award['id']; ?>">Edit</a> |
                        <a href="delete-award.php?id=<?php echo $award['id']; ?>" onclick="return confirm('Are you sure you want to delete this award?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>