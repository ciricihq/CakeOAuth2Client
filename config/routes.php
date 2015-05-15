<?php
use Cake\Routing\Router;

Router::plugin('OAuth2Client', function ($routes) {
    $routes->fallbacks('InflectedRoute');
});
