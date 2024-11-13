<?php
include 'db.php';
session_start();

if ($_SESSION['role'] != 'user') {
    header('Location: dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $complaint = $_POST['complaint'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO reports (user_id, complaint) VALUES (?, ?)");
    $stmt->execute([$user_id, $complaint]);

    echo "Complaint submitted successfully!";
}
?>
