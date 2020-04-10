<?php

use Slim\App;

return function (App $app) {
    $app->get('/home', \App\Action\HomeAction::class);

    $app->post('/users', \App\Action\UserCreateAction::class);
};

