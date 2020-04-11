<?php
error_reporting(0);
ini_set('display_errors', '0');
date_default_timezone_set('Europe/Berlin');

$settings = [];
$settings['root'] = dirname(__DIR__);
$settings['temp'] = $settings['root'] . '/tmp';
$settings['public'] = $settings['root'] . '/public';

$settings['error_handler_middleware'] = [
    'display_error_details' => true,
    'log_errors' => true,
    'log_error_details' => true,
];

$settings['db'] = [
    'driver' => 'mysql',
    'host' => 'localhost',
    'username' => 'gegege',
    'database' => 'treeMap',
    'password' => '',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'flags' => [
        PDO::ATTR_PERSISTENT => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => true,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
    ],
];

$settings['views'] = [
    'path' => __DIR__.'/../templates',
    'settings' => [
        'cache' => false
    ],
];

return $settings;
