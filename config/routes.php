<?php
use Cake\Routing\Router;

Router::plugin('OAuth2Client',['path' => '/oauth2'], function ($routes) {
    $routes->connect('/login',
        ['controller' => 'Auth', 'action' => 'login']
    );

    $routes->fallbacks('InflectedRoute');
});

