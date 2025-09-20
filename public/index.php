<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Http/routes/views.php';

use Http\Core\Dispatcher;
use League\Plates\Engine;

$templates = new Engine();

$templates->addFolder('admin', __DIR__ . '/../Views/admin');
$templates->addFolder('home', __DIR__ . '/../Views/home');
$templates->addFolder('error', __DIR__ . '/../Views/error');
$templates->addFolder('shared', __DIR__ . '/../Views/shared');

$container = new DI\Container();
$dispatcher = new Dispatcher($templates, $container);

$dispatcher->execute($_SERVER['REQUEST_URI']);
