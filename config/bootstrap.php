<?php

use Cake\Core\App;
use Cake\Core\Configure;

Configure::write('App.OAuth2Client.routes', [
    'base_uri' => 'http://your-api.url',
    'access_token_path' => '/oauth/v2/token',
    'refresh_token_path' => '/oauth/v2/token',
]);

Configure::write('App.OAuth2Client.keys', [
    'client_id' => 'your-client-id',
    'client_secret' => 'your-client-secret',
]);
