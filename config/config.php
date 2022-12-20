<?php

return [
    'doctrine_connection' => [
        "dbname" => "packages-test",
        "user" => "root",
        "password" => "",
        "host" => "localhost",
        "driver" => "pdo_mysql"
    ],
    'doctrine_config' => [
        "path" => "src/Entities",
        "isDev" => true
    ]
];