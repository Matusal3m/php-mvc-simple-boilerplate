<?php

namespace Http\Core;

// all keys need to be registed here

const IS_AUTHENTICATED = 'is_authenticated';

class Session
{
    private static array $config = [
        'name'            => 'RUFI_SESSION',
        'cookie_httponly' => 1,
    ];

    private static function handleSessionPath(): void
    {
        $path = getenv('SESSION_PATH');
        session_save_path($_SERVER['DOCUMENT_ROOT'] . $path);
    }

    public static function start(): void
    {
        self::handleSessionPath();
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start(self::$config);
        }
    }

    public static function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function unset(): void
    {
        session_unset();
    }

    public static function get(string $key): mixed
    {
        return $_SESSION[$key];
    }

    public static function check(string $key): bool
    {
        return !empty($_SESSION[$key]) && $_SESSION[$key];
    }

    public static function has(string $key): bool
    {
        return !empty($_SESSION[$key]);
    }

    public static function abort(): void
    {
        session_unset();
        session_destroy();
    }
}
