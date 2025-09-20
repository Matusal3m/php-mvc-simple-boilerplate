<?php

use Database\Database;
use Utils\Env;

Env::load(__DIR__ . '/../.env');

$host = getenv('PG_HOST');
$port = getenv('PG_PORT');
$db = getenv('PG_DATABASE');
$password = getenv('PG_PASSWORD');
$user = getenv('PG_USER');

return [
    'Database' => new Database($host, $port, $db, $user, $password)
];
