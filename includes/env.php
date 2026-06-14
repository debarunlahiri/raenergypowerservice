<?php
/**
 * Simple dotenv loader for RA Energy Power Service
 * Reads key=value pairs from .env file and sets them in $_ENV
 */

function load_env(string $path = __DIR__ . '/../.env'): void
{
    if (!file_exists($path)) {
        return;
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) {
        return;
    }

    foreach ($lines as $line) {
        $line = trim($line);
        // Skip comments and empty lines
        if (empty($line) || $line[0] === '#') {
            continue;
        }

        // Parse key=value
        $pos = strpos($line, '=');
        if ($pos === false) {
            continue;
        }

        $key = trim(substr($line, 0, $pos));
        $value = trim(substr($line, $pos + 1));

        // Remove surrounding quotes (single or double)
        if (strlen($value) >= 2) {
            if (($value[0] === '"' && $value[-1] === '"') || ($value[0] === "'" && $value[-1] === "'")) {
                $value = substr($value, 1, -1);
            }
        }

        // Set in $_ENV and $_SERVER
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }
}

function env(string $key, string $default = ''): string
{
    return $_ENV[$key] ?? $_SERVER[$key] ?? $default;
}
