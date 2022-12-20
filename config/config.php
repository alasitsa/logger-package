<?php

return [
    'doctrine_connection' => [
        "dbname" => env("DB_DATABASE", "laravel"),
        "user" => env("DB_USERNAME", "root"),
        "password" => env("DB_PASSWORD", ""),
        "host" => env("DB_HOST", "localhost"),
        "port" => env("DB_PORT", "3306"),
        "driver" => env("DB_DRIVER", "pdo_mysql")
    ],
    'doctrine_config' => [
        "path" => env("ENTITIES_PATH", "src/Entities"),
        "isDev" => env("DEV_MODE", "true") == "true"
    ],
    'log_file' => $_SERVER["DOCUMENT_ROOT"] . "/../" . env("LOG_FILE", '/logs1.csv')
];