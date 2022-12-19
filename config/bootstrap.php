<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;

require "vendor/autoload.php";

$config = Setup::createAnnotationMetadataConfiguration(["src/Entities"], true);

$connection = [
    "dbname" => env("DB_DATABASE", "doctrine"),
    "user" => env("DB_USERNAME", "root"),
    "password" => env("DB_PASSWORD", ""),
    "host" => env("DB_HOST", "localhost"),
    "driver" => "pdo_" . env("DB_CONNECTION", "mysql")
];

try {
    $entityManager = EntityManager::create($connection, $config);
} catch (ORMException $e) {
    dd($e);
}