<?php

use Cake\Core\App;
use Cake\Core\Configure;

Configure::write('App.OAuth2Client.routes', [
    'base_uri' => 'http://api.davantis.cirici.com',
    'access_token_path' => '/oauth/v2/token',
    'refresh_token_path' => '/oauth/v2/token',
]);

Configure::write('App.OAuth2Client.keys', [
    'client_id' => '2_3cvbgyjmbkqo4kcgc44gsko8g8oogk48g4ckscgkssk4cgokkg',
    'client_secret' => '4z7ya3uonlgcskok4gokccgw0w8sg8gkgkwso0s84g4kk8ocko',
]);
