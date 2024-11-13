<?php
include 'db.php';
session_start();

if ($_SESSION['role'] != 'admin') {
    header('Location: dashboard.php');
    exit;
}

if (isset($_GET['id'])) {
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    header('Location: dashboard.php');
}
?>
