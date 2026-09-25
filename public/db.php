<?php
// Shared database connection. Include with: require 'db.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $db = new mysqli(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_NAME'));
} catch (mysqli_sql_exception $e) {
    die('<p>Database is still starting. Wait 10 seconds and refresh.</p>');
}
