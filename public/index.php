<?php require 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>My PHP Lab</title></head>
<body style="font-family:sans-serif;max-width:700px;margin:2em auto">
  <h1>It works!</h1>
  <p>Apache + PHP <?= PHP_VERSION ?> + MySQL are running.</p>

  <h2>Products (from the database)</h2>
  <table border="1" cellpadding="6">
    <tr><th>Name</th><th>Price</th></tr>
    <?php foreach ($db->query('SELECT name, price FROM products') as $row): ?>
      <tr>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td>£<?= htmlspecialchars($row['price']) ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <h2>Security demos</h2>
  <ul>
    <li><a href="login_vulnerable.php">Login (VULNERABLE to SQL injection)</a></li>
    <li><a href="login_safe.php">Login (safe, prepared statement)</a></li>
  </ul>
</body>
</html>
