<?php

namespace Http\Core;

class Request
{
    function __construct(
        private readonly array|null $params
    ) {
    }

    public function method()
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    public function body(): array|null
    {
        $validMethod = match ($this->method()) {
            "POST", "PUT", "PATCH", "DELETE" => true,
            default => false
        };

        if (!$validMethod) return null;

        $body = file_get_contents('php://input');
        if (!is_array($body) || !empty($body)) {
            unset($_REQUEST['_method']);
            return $_REQUEST ?? [];
        }

        return json_decode($body, true) ?? [];
    }

    public function file(string $filename): array|null
    {
        return isset($_FILES[$filename]) ? $_FILES[$filename] : null;
    }

    public function params(): array|null
    {
        return $this->params;
    }
}
