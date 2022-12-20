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
        require(__DIR__ . "/../../config/constants.php");
        $config = require file_exists(CONFIG_FILE) ? CONFIG_FILE : LOCAL_CONFIG_FILE;
        $orm_setup = ORMSetup::createAttributeMetadataConfiguration([$config['doctrine_config']["path"]], $config['doctrine_config']["isDev"]);
        return EntityManager::create($config['doctrine_connection'], $orm_setup);
    }
}