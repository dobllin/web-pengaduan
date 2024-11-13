<?php
include 'db.php';
session_start();

// Cek apakah yang mengakses adalah admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit;
}

// Ambil data pengaduan dari database
$stmt = $conn->prepare("SELECT reports.id, users.username, reports.complaint, reports.created_at
                        FROM reports
                        JOIN users ON reports.user_id = users.id
                        ORDER BY reports.created_at DESC");
$stmt->execute();
$reports = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Reports</title>
</head>
<body>
    <h1>User Reports</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Complaint</th>
            <th>Date</th>
        </tr>
        <?php foreach ($reports as $report): ?>
            <tr>
                <td><?php echo htmlspecialchars($report['id']); ?></td>
                <td><?php echo htmlspecialchars($report['username']); ?></td>
                <td><?php echo htmlspecialchars($report['complaint']); ?></td>
                <td><?php echo htmlspecialchars($report['created_at']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
