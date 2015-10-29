<?php

use Cake\Core\App;
use Cake\Core\Configure;

Configure::write('App.OAuth2Client.routes', [
    'base_uri' => 'http://api.davantis.cirici.com',
    'access_token_path' => '/oauth/v2/token',
    'refresh_token_path' => '/oauth/v2/token',
]);

Configure::write('App.OAuth2Client.keys', [
    'client_id' => '2_5qa9f6iutlogk0c88oggswkcwggos8kwc8w00c04co0040ko84',
    'client_secret' => '471yun8du9mocc48scc488kook00ows44wccw0g4ogo0wwo44w',
]);
