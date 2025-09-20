<?php

namespace Http\Core;

use DI\Container;
use League\Plates\Engine;

use function DI\get;

class Dispatcher
{
    public function __construct(
        private readonly Engine $templates,
        private readonly Container $container,
    ) {
    }

    function execute(string $path): void
    {
        $path = Router::normalizePath($path);
        $method = strtoupper($_SERVER['REQUEST_METHOD']);
        $foundPath = false;
        foreach (Router::routes() as $route) {
            if ($method !== $route['method']) continue;

            $pattern = '#^' . preg_replace('/{[a-zA-Z_]*}/', '([\w-]+)', $route['path']) . '$#';
            if (!preg_match($pattern, $path, $matches)) continue;

            [$class, $name] = $route['controller'];

            $controller = $this->container->get($class);
            $controller = get($class);

            $request = new Request($matches);
            $response = new Response($this->templates);

            $controller->{$name}($request, $response);

            $foundPath = true;
        }

        if (!$foundPath) {
            http_response_code(404);
            echo $this->templates->render('error::not_found');
        }
    }
}
