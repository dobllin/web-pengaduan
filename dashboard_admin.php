<?php
include 'db.php';
session_start();

// Cek apakah pengguna sudah login dan perannya adalah admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome Admin, <?php echo htmlspecialchars($username); ?>!</h1>
        <p>You have full access to the system.</p>

        <!-- Menu untuk admin -->
        <ul>
            <li><a href="view_reports.php">View User Reports</a></li>
            <li><a href="manage_users.php">Manage Users</a></li>
            <li><a href="view_admins.php">View Admins</a></li> <!-- Link untuk melihat admin -->
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>
