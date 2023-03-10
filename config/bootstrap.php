<?php

use Doctrine\ORM\Exception\ORMException;
use Logger\Providers\EntityManagerProvider;

require "vendor/autoload.php";

try {
    $entityManager = EntityManagerProvider::provide();
} catch (ORMException $e) {
    dd($e);
}