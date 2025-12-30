<?php

namespace Http\Core;

class Http
{
    public static function redirect(string $path): void
    {
        header("Location: $path");
    }
}
