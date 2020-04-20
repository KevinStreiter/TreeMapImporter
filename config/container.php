<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Psr\Container\ContainerInterface;
use Selective\Config\Configuration;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Middleware\ErrorMiddleware;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Twig\Loader\FilesystemLoader;

return [
    Configuration::class => function () {
        return new Configuration(require __DIR__ . '/settings.php');
    },

    App::class => function (ContainerInterface $container) {
        AppFactory::setContainer($container);
        $app = AppFactory::create();

        $app->setBasePath('/treeMap');

        return $app;
    },

    ErrorMiddleware::class => function (ContainerInterface $container) {
        $app = $container->get(App::class);
        $settings = $container->get(Configuration::class)->getArray('error_handler_middleware');

        return new ErrorMiddleware(
            $app->getCallableResolver(),
            $app->getResponseFactory(),
            (bool)$settings['display_error_details'],
            (bool)$settings['log_errors'],
            (bool)$settings['log_error_details']
        );
    },

    'db' => function(ContainerInterface $container) {
        $settings = $container->get(Configuration::class)->getArray('doctrine');
        $config = Setup::createAnnotationMetadataConfiguration(
            $settings['metadata_dirs'],
            $settings['dev_mode'],
            null,
            null,
            false
        );
        return EntityManager::create($settings['connection'], $config);
    },

    Twig::class => function (ContainerInterface $container) {
        $settings = $container->get(Configuration::class)->getArray('views');
        $loader = new FilesystemLoader($settings['path']);
        return new Twig($loader, $settings);
    },

    TwigMiddleware::class => function (ContainerInterface $container) {
        return TwigMiddleware::createFromContainer($container->get(App::class), Twig::class);
    }

];
