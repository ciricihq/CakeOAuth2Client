<?php

use Cake\Core\App;
use Cake\Core\Configure;

Configure::write('App.OAuth2Client.routes', [
    'base_uri' => 'http://localhost',
    'access_token_path' => '/oauth/v2/token',
    'refresh_token_path' => '/oauth/v2/token',
]);
