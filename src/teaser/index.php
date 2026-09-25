<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Teaser — Login</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 400px; margin: 80px auto; line-height: 1.6; }
        input { display: block; width: 100%; padding: 8px; margin-bottom: 12px; box-sizing: border-box; }
        button { padding: 8px 20px; }
        .error { background: #fdecea; color: #a33; padding: 10px 14px; border-radius: 6px; margin-bottom: 16px; }
    </style>
</head>
<body>
    <h1>Log in</h1>

    <?php if (!empty($_GET['error'])): ?>
        <div class="error">Invalid username or password.</div>
    <?php endif; ?>

    <form action="login.php" method="post">
        <label for="user">Username</label>
        <input type="text" id="user" name="user" required autofocus>

        <label for="pass">Password</label>
        <input type="password" id="pass" name="pass" required>

        <button type="submit">Log in</button>
    </form>

    <p><small>Demo account: <code>alice</code> / <code>password123</code></small></p>
</body>
</html>
