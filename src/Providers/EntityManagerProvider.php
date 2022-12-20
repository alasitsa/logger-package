<?php


namespace Logger\Providers;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\ORMSetup;

class EntityManagerProvider
{
    /**
     * @return EntityManager
     *
     * @throws ORMException
     */
    public static function provide(): EntityManager
    {
        $config = require(__DIR__ . '/../../config/config.php');
        $orm_setup = ORMSetup::createAttributeMetadataConfiguration([$config['doctrine_config']["path"]], $config['doctrine_config']["isDev"]);
        return EntityManager::create($config['doctrine_connection'], $orm_setup);
    }
}