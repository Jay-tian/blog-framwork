<?php

use \Phpmig\Adapter;
use Doctrine\DBAL\DriverManager;

$container = new ArrayObject();

$container['db'] =  DriverManager::getConnection(array(
        'dbname' => 'blog',
        'user' => 'root',
        'password' => '',
        'host' => '127.0.0.1',
        'port' => 3306,
        'driver' => 'pdo_mysql',
        'charset' => 'utf8',
    ));
// replace this with a better Phpmig\Adapter\AdapterInterface
$container['phpmig.adapter'] = new Adapter\File\Flat(__DIR__ . DIRECTORY_SEPARATOR . 'migrations/.migrations.log');

$container['phpmig.migrations_path'] = __DIR__ . DIRECTORY_SEPARATOR . 'migrations';

// You can also provide an array of migration files
// $container['phpmig.migrations'] = array_merge(
//     glob('migrations_1/*.php'),
//     glob('migrations_2/*.php')
// );

return $container;