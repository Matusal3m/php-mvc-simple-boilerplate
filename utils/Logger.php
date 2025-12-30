<?php

namespace Utils;

use Exception;
use Throwable;

class Logger
{
    public static function log(mixed $content): void
    {
        if (is_array($content) || is_object($content)) {
            $content = json_encode($content, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
        $content = preg_replace('#\\\/#', '/', strval($content));
        error_log($content, 0);
    }

    public static function error(Exception|Throwable|string $error, array $context = []): void
    {
        $logEntry = [
            'level' => 'ERROR',
            'error' => is_string($error) ? $error : $error->getMessage(),
            'file' => is_object($error) ? $error->getFile() : null,
            'line' => is_object($error) ? $error->getLine() : null,
            'trace' => is_object($error) ? $error->getTraceAsString() : null,
            'context' => !empty($context) ? $context : null
        ];

        $logEntry = array_filter($logEntry, function ($value) {
            return $value !== null;
        });

        self::log($logEntry);
    }

    public static function warning(string $message, array $context = []): void
    {
        self::writeLog('WARNING', $message, $context);
    }

    public static function info(string $message, array $context = []): void
    {
        self::writeLog('INFO', $message, $context);
    }

    public static function debug(string $message, array $context = []): void
    {
        self::writeLog('DEBUG', $message, $context);
    }

    private static function writeLog(string $level, string $message, array $context = []): void
    {
        $logEntry = [
            'level' => $level,
            'message' => $message,
            'context' => !empty($context) ? $context : null
        ];

        $logEntry = array_filter($logEntry, function ($value) {
            return $value !== null;
        });

        self::log($logEntry);
    }
}
