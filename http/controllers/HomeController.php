<?php

namespace Http\Controllers;

use Http\Core\Request;
use Http\Core\Response;

class HomeController
{
    public function index(Request $req, Response $res): void
    {
        $res->template('home::index');
    }
}
