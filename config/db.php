<?php

require  __DIR__ . '/config.php';

try {
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
} catch (PDOException $e) {
    die($e->getMessage());
}
