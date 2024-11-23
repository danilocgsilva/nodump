<?php

require 'vendor/autoload.php';

use Doctrine\DBAL\DriverManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;

$config = new PhpFile(__DIR__.'/config/migrationsConfiguration.php');

$entitiesPaths = [__DIR__.'/src/Entities'];

$ORMConfig = ORMSetup::createAttributeMetadataConfiguration($entitiesPaths, isDevMode: true);
$connection = DriverManager::getConnection([
    'dbname' => getenv('NODUMP_SOURCE_NAME'),
    'user' => getenv('NODUMP_SOURCE_USER'),
    'password' => getenv('NODUMP_SOURCE_NAME'),
    'host' => getenv('NODUMP_SOURCE_HOST'),
    'driver' => 'pdo_mysql'
]);

$entityManager = new EntityManager($connection, $ORMConfig);

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));
