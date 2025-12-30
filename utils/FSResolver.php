<?php

namespace Utils;

class FSResolver
{

    private static ?string $baseUrl = null;

    public static function assetPath(string $group, string $name): string
    {
        $groupPath = self::sanitizePath($group);
        $fileName = self::sanitizeFilename($name);

        $path = self::getBasePath() . $groupPath . '/' . $fileName;

        Logger::log([
            'path' => $path
        ]);

        return $path;
    }

    public static function getRelativePath(string $path = 'assets')
    {
        $path = trim($path, '/');
        return rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/' . $path;
    }

    public static function assetGet(string $group, string $name): ?string
    {
        $filePath = self::assetPath($group, $name);

        if (!file_exists($filePath)) {
            return null;
        }

        $content = file_get_contents($filePath);
        return $content === false ? null : $content;
    }

    public static function assetExists(string $group, string $name): bool
    {
        $path = self::assetPath($group, $name);
        $path = self::getRelativePath($path);

        return file_exists($path);
    }

    public static function assetRemove(string $group, string $name): bool
    {
        $filePath = self::assetPath($group, $name);

        if (!file_exists($filePath)) {
            return true;
        }

        return unlink($filePath);
    }

    public static function setBasePath(string $path): void
    {
        self::$baseUrl = rtrim($path, '/') . '/';
    }

    private static function getBasePath(): string
    {
        return self::$baseUrl ?? '';
    }

    private static function getExtension($name): string
    {
        $ext = end(explode('.', $name));
        return $ext ? '.' . $ext : '';
    }

    private static function sanitizeFilename(string $filename): string
    {
        $filename = preg_replace('/[^a-zA-Z0-9._-]/', '', $filename);
        $filename = basename($filename);

        return $filename ?: 'default' . self::getExtension($filename);
    }

    private static function sanitizePath(string $path): string
    {
        $path = preg_replace('/[^a-zA-Z0-9_-]/', '', $path);
        $path = trim($path, './');

        return $path;
    }
}
