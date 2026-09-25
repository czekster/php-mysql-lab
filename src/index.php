<?php
// This file lives in the APPLICATION tier: Apache received the HTTP request
// and handed it to PHP, which is running this code right now.

$host = 'db';               // service name from docker-compose.yml — Docker's
                             // internal DNS resolves this to the db container
$dbname = getenv('DB_NAME') ?: 'app_db';
$user   = getenv('DB_USER') ?: 'student';
$pass   = getenv('DB_PASSWORD') ?: '';

try {
    // This connection call is the tier boundary: application tier -> data tier
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    $dbStatus = "Connected to MariaDB successfully.";
} catch (PDOException $e) {
    $dbStatus = "Could not connect to the database: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Three-Tier Starter Kit</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 640px; margin: 60px auto; line-height: 1.6; }
        .tier { padding: 12px 16px; border-radius: 6px; margin-bottom: 12px; }
        .presentation { background: #eef4ff; }
        .application { background: #eef7ee; }
        .data { background: #fff4e6; }
        code { background: #f0f0f0; padding: 2px 6px; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>It works — three tiers, three containers</h1>

    <div class="tier presentation">
        <strong>Presentation tier:</strong> this page, rendered by your browser.
    </div>
    <div class="tier application">
        <strong>Application tier:</strong> Apache handed this request to PHP,
        which generated this HTML — including the line below.
    </div>
    <div class="tier data">
        <strong>Data tier:</strong> <?= htmlspecialchars($dbStatus) ?>
    </div>

    <p>Start building in <code>src/</code> — every file you add here is live
    immediately, no rebuild needed.</p>
    <p>Inspect your database with phpMyAdmin:
        <a href="http://localhost:8081">http://localhost:8081</a> on your own machine,
        or in Codespaces open the <strong>Ports</strong> tab and click the globe next to
        <em>phpmyadmin</em>.</p>

    <div class="tier" style="background: #f3eefc;">
        <strong>Try the teaser:</strong> a working login page + results page,
        backed by a real <code>users</code> table —
        <a href="teaser/">open the teaser</a>.
        See <code>src/teaser/README.md</code> for setup and how it's built.
    </div>
</body>
</html>
