<?php

namespace Http\Core;

use League\Plates\Engine;
use Http\Core\Http;

class Response
{
    private int $response_code = 200;

    public function __construct(
        private readonly Engine $templates
    ) {}

    public function status(int $code): self
    {
        $this->response_code = $code;
        return $this;
    }

    public function send(string $data): void
    {
        http_response_code($this->response_code);
        echo $data;
    }

    public function template(string $name, array $data = []): void
    {
        if ($this->templates->exists($name . '/index')) {
            http_response_code($this->response_code);
            echo $this->templates->render($name . '/index', $data);
            return;
        }

        if (!$this->templates->exists($name)) {
            http_response_code(404);
            echo $this->templates->render('pages::error/not_found');
            return;
        }

        http_response_code($this->response_code);
        echo $this->templates->render($name, $data);
    }

    public function json(array $data): void
    {
        http_response_code($this->response_code);
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function redirect(string $path)
    {
        Http::redirect($path);
    }
}
