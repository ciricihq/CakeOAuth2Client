<?php

use Cake\Core\App;
use Cake\Core\Configure;

Configure::write('App.OAuth2Client.routes', [
    'base_uri' => 'http://api.davantis.cirici.com',
    'access_token_path' => '/oauth/v2/token',
    'refresh_token_path' => '/oauth/v2/token',
]);

Configure::write('App.OAuth2Client.keys', [
    'client_id' => '5_g9kl415lewgscs44oocggwkcos4oswc0sos4sgcw4wgwg4koc',
    'client_secret' => 'whmp9v4ab280o80kksws4480kk84cw0g0kwwssso84kok8cw4',
]);
