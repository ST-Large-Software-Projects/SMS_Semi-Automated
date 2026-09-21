<?php

if (!defined('APP_ROOT')) {
    define('APP_ROOT', dirname(__DIR__));
}

function app_env($key, $default = null)
{
    static $cache = null;

    if ($cache === null) {
        $cache = array();
        $envFile = APP_ROOT . DIRECTORY_SEPARATOR . '.env';

        if (is_file($envFile)) {
            $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            if ($lines !== false) {
                foreach ($lines as $line) {
                    $line = trim($line);

                    if ($line === '' || strpos($line, '#') === 0) {
                        continue;
                    }

                    $parts = explode('=', $line, 2);
                    $name = trim($parts[0]);
                    $value = isset($parts[1]) ? trim($parts[1]) : '';

                    $cache[$name] = trim($value, " \t\n\r\0\x0B\"'");
                }
            }
        }
    }

    if (array_key_exists($key, $cache)) {
        return $cache[$key];
    }

    if (array_key_exists($key, $_ENV)) {
        return $_ENV[$key];
    }

    if (array_key_exists($key, $_SERVER)) {
        return $_SERVER[$key];
    }

    return $default;
}

function app_db_config()
{
    return array(
        'host' => app_env('DB_HOST', 'localhost'),
        'username' => app_env('DB_USERNAME', 'root'),
        'password' => app_env('DB_PASSWORD', ''),
        'database' => app_env('DB_NAME', 'school_management_system'),
    );
}

function app_db_connection()
{
    $config = app_db_config();
    $connection = mysqli_connect(
        $config['host'],
        $config['username'],
        $config['password'],
        $config['database']
    );

    if (!$connection) {
        trigger_error('Database connection failed: ' . mysqli_connect_error(), E_USER_WARNING);
        return null;
    }

    return $connection;
}

function app_base_url()
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
    $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';

    return $protocol . $host;
}
