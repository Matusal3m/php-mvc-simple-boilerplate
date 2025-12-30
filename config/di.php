<?php

use Database\Database;
use DI\ContainerBuilder;
use Utils\Env;

Env::load(__DIR__ . '/../.env');

$host = getenv('POSTGRES_HOST');
$port = getenv('POSTGRES_PORT');
$db = getenv('POSTGRES_DATABASE');
$user = getenv('POSTGRES_USER');
$password = getenv('POSTGRES_PASSWORD');

$builder = new ContainerBuilder();

$builder->addDefinitions([
    Database::class => function () use ($host, $port, $db, $user, $password) {
        return new Database($host, (int)$port, $db, $user, $password);
    },
]);

$container = $builder->build();

return $container;
