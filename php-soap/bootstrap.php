<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/vendor/autoload.php';

function getEntityManager() 
{
    // $dbParams = array(
    //     'host'      => $_ENV['DATABASE_HOST'],
    //     'port'      => $_ENV['DATABASE_PORT'],
    //     'dbname'    => $_ENV['DATABASE_NAME'],
    //     'user'      => $_ENV['DATABASE_USER'],
    //     'password'  => $_ENV['DATABASE_PASSWD'],
    //     'driver'    => $_ENV['DATABASE_DRIVER'],
    //     'charset'   => $_ENV['DATABASE_CHARSET']
    // );

    $dbParams = array(
        'host'      => '127.0.0.1',
        'port'      => '3306',
        'dbname'    => 'epayco',
        'user'      => 'demo',
        'password'  => 'demo',
        'driver'    => 'pdo_mysql',
        'charset'   => 'UTF8'
    );

    $config = Setup::createAnnotationMetadataConfiguration(
        array(__DIR__.'./entities'),         // paths to mapped entities
        boolval(0),                     // developer mode
        ini_get('sys_temp_dir'),            // Proxy dir
        null,                               // Cache implementation
        false                               // use Simple Annotation Reader
    );

    $config->setAutoGenerateProxyClasses(true);
    if (boolval(0)) {
        $config->setSQLLogger(new \Doctrine\DBAL\Logging\EchoSQLLogger());
    }

    // $config = Setup::createAnnotationMetadataConfiguration(
    //     array(__DIR__.$_ENV['ENTITY_DIR']),         // paths to mapped entities
    //     boolval($_ENV['DEBUG']),                     // developer mode
    //     ini_get('sys_temp_dir'),            // Proxy dir
    //     null,                               // Cache implementation
    //     false                               // use Simple Annotation Reader
    // );

    // $config->setAutoGenerateProxyClasses(true);
    // if (boolval($_ENV['DEBUG'])) {
    //     $config->setSQLLogger(new \Doctrine\DBAL\Logging\EchoSQLLogger());
    // }

    return EntityManager::create($dbParams, $config);
}