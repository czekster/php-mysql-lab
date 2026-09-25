<?php
// Shared connection used by every page in this folder.
// Same pattern as src/index.php — host is always 'db', the service name
// from docker-compose.yml, not 'localhost'.

function get_db(): PDO
{
    $host   = 'db';
    $dbname = getenv('DB_NAME') ?: 'app_db';
    $user   = getenv('DB_USER') ?: 'student';
    $pass   = getenv('DB_PASSWORD') ?: '';

    return new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
}
