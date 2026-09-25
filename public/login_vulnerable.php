<?php
// DELIBERATELY VULNERABLE - for teaching only.
// Try username:  admin' --     (with a space after the dashes) and any password.
require 'db.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = $_POST['username'];
    $p = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = '$u' AND password = '$p'";
    try {
        $res = $db->query($sql);
        $msg = $res->num_rows > 0 ? "Logged in as " . $res->fetch_assoc()['username'] : "Wrong login";
    } catch (mysqli_sql_exception $e) {
        $msg = "SQL error: " . $e->getMessage();
    }
    $msg .= "<br><small>Query run: <code>" . htmlspecialchars($sql) . "</code></small>";
}
?>
<h1>Vulnerable login</h1>
<form method="post">
  <input name="username" placeholder="username">
  <input name="password" type="password" placeholder="password">
  <button>Login</button>
</form>
<p><?= $msg ?></p>
<p><a href="index.php">Back</a></p>
