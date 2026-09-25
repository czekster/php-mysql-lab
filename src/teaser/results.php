<?php
session_start();

if (empty($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Teaser — Welcome</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 400px; margin: 80px auto; line-height: 1.6; }
    </style>
</head>
<body>
    <h1>Welcome, <?= $_SESSION['user'] ?>!</h1>
    <p>You're logged in.</p>
    <p><a href="logout.php">Log out</a></p>
</body>
</html>
