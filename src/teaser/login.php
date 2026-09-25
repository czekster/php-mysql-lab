<?php
session_start();
require __DIR__ . '/db.php';

$user = $_POST['user'] ?? '';
$pass = $_POST['pass'] ?? '';

$pdo = get_db();

$sql = "SELECT id, user FROM users WHERE user = '$user' AND pass = '$pass'";
$row = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $_SESSION['user'] = $row['user'];
    header('Location: results.php');
    exit;
}

header('Location: index.php?error=1');
exit;
