<?php
include 'db.php';
session_start();

// Cek apakah pengguna sudah login dan perannya adalah user
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome User, <?php echo htmlspecialchars($username); ?>!</h1>
        <p>You can submit complaints here.</p>

        <!-- Form untuk user submit pengaduan -->
        <form method="POST" action="submit_complaint.php">
            <textarea name="complaint" placeholder="Your complaint here..." required></textarea>
            <button type="submit">Submit Complaint</button>
        </form>

        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>
