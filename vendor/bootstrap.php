<?php
namespace App;
// bootstrap.php
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "autoload.php";

// Create a simple "default" Doctrine ORM configuration for Attributes
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: ['C:\xampp\htdocs\epidemia_bis/src/entities'],
    isDevMode: true,
);
// or if you prefer XML
// $config = ORMSetup::createXMLMetadataConfiguration(
//    paths: [__DIR__ . '/config/xml'],
//    isDevMode: true,
//);

// configuring the database connection
$connection = DriverManager::getConnection([
    'driver' => 'pdo_mysql',
    'user' =>'root',
    'password' => 'M@gn1#Poste',
    'dbname' => 'db_epidemia',
    'host' => 'localhost',
], $config);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);