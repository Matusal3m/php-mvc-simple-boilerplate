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

        return json_decode(file_get_contents('php://input'), true) ?? [];
    }

    public function params(): array|null
    {
        return $this->params();
    }
}
