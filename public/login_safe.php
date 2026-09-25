<?php
// SAFE version: prepared statement. The same injection attempt fails here.
require 'db.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $db->prepare('SELECT username FROM users WHERE username = ? AND password = ?');
    $stmt->bind_param('ss', $_POST['username'], $_POST['password']);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();
    $msg = $row ? 'Logged in as ' . htmlspecialchars($row['username']) : 'Wrong login';
}
?>
<h1>Safe login</h1>
<form method="post">
  <input name="username" placeholder="username">
  <input name="password" type="password" placeholder="password">
  <button>Login</button>
</form>
<p><?= $msg ?></p>
<p><a href="index.php">Back</a></p>
