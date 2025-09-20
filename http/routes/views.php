<?php

namespace Http\Routes;

use Http\Controllers\HomeController;
use Http\Core\Router;

Router::get('/', [HomeController::class, 'index']);
