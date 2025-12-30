<?php

namespace Http;

use Gym\Controllers\HomeController;
use Http\Core\Router;

Router::get('/', [HomeController::class, 'index']);
