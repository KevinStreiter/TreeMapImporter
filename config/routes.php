<?php

use App\Controllers\HomeController;
use App\Models\User;
use Slim\App;

return function (App $app) {
    $app->get('/home', HomeController::class);

    $app->get('/users/create', function($request, $response) {
        $user = new User();
        $user->setName("kevin5");
        $this->get('db')->persist($user);
        $this->get('db')->flush();
        return $response;
    });

    $app->get('/users', function($request, $response) {
        $users = $this->get('db')->getRepository(User::class)->findAll();
        var_dump($users);
        die();
        return $response;
    });
};

