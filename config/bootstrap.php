<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\ORMSetup;

require "vendor/autoload.php";

$config = ORMSetup::createAttributeMetadataConfiguration(["src/Entities"], true);

$connection = [
    "dbname" => "packages-test",
    "user" => "root",
    "password" => "",
    "host" => "localhost",
    "driver" => "pdo_mysql"
];

try {
    $entityManager = EntityManager::create($connection, $config);
} catch (ORMException $e) {
    dd($e);
}