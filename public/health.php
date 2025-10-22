<?php
header('Content-Type: text/plain');
echo 'PHP: ' . PHP_VERSION . "\n";
echo 'SAPI: ' . php_sapi_name() . "\n";
echo 'mysqli_loaded: ' . (class_exists('mysqli') ? 'yes' : 'no') . "\n";
$host = getenv('DB_HOST') ?: '127.0.0.1';
$port = getenv('DB_PORT') ?: '3306';
echo "DB_HOST: $host\n";
echo "DB_PORT: $port\n";
