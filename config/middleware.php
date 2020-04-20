<?php
use Slim\App;
use Slim\Middleware\ErrorMiddleware;
use Slim\Views\TwigMiddleware;

return function (App $app) {

    $app->addBodyParsingMiddleware();

    $app->addRoutingMiddleware();

    $app->add(ErrorMiddleware::class);

    $app->add(TwigMiddleware::class);
};