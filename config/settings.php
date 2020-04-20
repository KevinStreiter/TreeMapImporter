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

$settings['doctrine'] = [
    'dev_mode' => true,
    'cache_dir' =>  dirname(__DIR__) . '/var/doctrine',
    'metadata_dirs' => [dirname(__DIR__) . '/src'],
    'connection' => [
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'port' => 3306,
        'dbname' => 'treeMap',
        'user' => 'gegege',
        'password' => 'MWXw9$Ppmjl51drrm7',
        'charset' => 'utf-8'
    ]
];

$settings['views'] = [
    'path' => __DIR__.'/../templates',
    'settings' => [
        'cache' => false
    ],
];

return $settings;
