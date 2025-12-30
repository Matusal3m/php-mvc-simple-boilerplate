<?php

namespace Utils;

class Env
{
    static function load(string $path): void
    {

        $file = file_get_contents($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if (!$file) return;
        $lines = explode("\n", $file);

        foreach ($lines as $line) {
            if (str_starts_with(trim($line), '#')) {
                continue;
            }

            if (strpos($line, '=') !== false) {
                $line = preg_replace('/\'|"/', '', $line);
                putenv($line);
            }
        }
    }
}
