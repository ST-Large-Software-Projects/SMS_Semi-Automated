<?php

require_once __DIR__ . '/../config/app.php';

$conn = app_db_connection();

if ($conn === null) {
    http_response_code(500);
    exit('Database connection failed.');
}

?>