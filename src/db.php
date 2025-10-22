<?php
// Central DB connection. Use env vars if present; otherwise defaults.
// Usage: $conn = get_db();

function get_db(): mysqli {
    // Use 127.0.0.1 by default to force TCP and avoid missing UNIX socket errors
    $host = getenv('DB_HOST') ?: '127.0.0.1';
    $user = getenv('DB_USER') ?: 'root';
    $pass = getenv('DB_PASS') ?: '';
    $name = getenv('DB_NAME') ?: 'KaosTekDB';
    $port = getenv('DB_PORT') ?: 3306;

    $conn = @new mysqli($host, $user, $pass, $name, (int)$port);
    if ($conn->connect_error) {
        // More user-friendly message; log actual error if needed
        die('Database connection failed. Please check db.php settings. Error: ' . $conn->connect_error);
    }

    // set charset explicitly
    $conn->set_charset('utf8mb4');
    return $conn;
}
