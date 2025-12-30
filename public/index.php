<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../http/routes.php';

$container = require_once __DIR__ . '/../config/di.php';
$templates = require_once __DIR__ . '/../config/templates.php';

use Http\Core\Dispatcher;

$dispatcher = new Dispatcher($templates, $container);

$dispatcher->execute($_SERVER['REQUEST_URI']);
