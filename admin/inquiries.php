<?php
require_once '../includes/functions.php';
require_once '../includes/db.php';

if (!isAdmin()) {
    redirect('login.php');
}

// Pagination setup
$perPage = 10;
$page = isset($_GET['page']) && $_GET['page'] > 0 ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $perPage;

// Fetch inquiries
$total = $pdo->query("SELECT COUNT(*) FROM enquiries")->fetchColumn();
$stmt = $pdo->prepare("SELECT * FROM enquiries ORDER BY submitted_at DESC LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$inquiries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enquiries - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table thead { background-color: #343a40; color: #fff; }
        .modal-body { white-space: pre-wrap; }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-center text-primary">Customer Enquiries</h2>

    <?php if (isset($_GET['deleted'])): ?>
        <div class="alert alert-success">Inquiry deleted successfully.</div>
    <?php endif; ?>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($inquiries): ?>
            <?php foreach ($inquiries as $index => $inq): ?>
                <tr>
                    <td><?= $offset + $index + 1 ?></td>
                    <td><?= htmlspecialchars($inq['name']) ?></td>
                    <td><?= htmlspecialchars($inq['email']) ?></td>
                    <td><?= date('d M Y, h:i A', strtotime($inq['submitted_at'])) ?></td>
                    <td>
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewModal<?= $inq['id'] ?>">View</button>
                        <a href="delete_inquiry.php?id=<?= $inq['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this inquiry?');">Delete</a>
                    </td>
                </tr>

                <!-- View Modal -->
                <div class="modal fade" id="viewModal<?= $inq['id'] ?>" tabindex="-1" aria-labelledby="viewModalLabel<?= $inq['id'] ?>" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="viewModalLabel<?= $inq['id'] ?>">
          📩 Inquiry from <?= htmlspecialchars($inq['name']) ?>
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label fw-bold text-secondary">Email:</label>
          <div class="border rounded p-2 bg-light">
            <?= htmlspecialchars($inq['email']) ?>
          </div>
        </div>
        <div>
          <label class="form-label fw-bold text-secondary">Message:</label>
          <div class="border rounded p-3 bg-white" style="min-height: 100px;">
            <?= nl2br(htmlspecialchars($inq['message'])) ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5" class="text-center">No inquiries found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <?php
    $totalPages = ceil($total / $perPage);
    if ($totalPages > 1): ?>
        <nav>
            <ul class="pagination justify-content-center">
                <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                    <li class="page-item <?= ($p == $page) ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $p ?>"><?= $p ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
