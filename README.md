# OAuth2Client plugin for CakePHP

This plugin provides OAuth2 Password grant scenario to your cake3 projects.

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

```
composer require ciricihq/cake-oauth2-client
```

## Setup

This plugin needs the next two configations parameter blocks to fit your system requirements:

```php
Configure::write('App.OAuth2Client.routes', [
    'base_uri' => 'http://your-api.url', // The OAuth2 API endpoint
    'access_token_path' => '/oauth/v2/token', // The access token url relative to base_uri
    'refresh_token_path' => '/oauth/v2/token', // The refresh token url relative to base_uri
]);
```

```php
Configure::write('App.OAuth2Client.keys', [
    'client_id' => 'your-client-id', // The client id needed to request the access token
    'client_secret' => 'your-client-secret', // The client secret needed to request the access token
]);
```

You can add them in your app.php configuration file in the App array.

```php
'App' => [
    ...
    ...
    'OAuth2Client' => [
        'routes' => [
            'base_uri' => 'http://your-awesome-oauth-api-endpoint.url'
            'access_token_path' => '/oauth/v2/token',
            'refresh_token_path' => '/oauth/v2/token',
        ],
        'keys' => [
            'client_id' => 'you_client_provided_id',
            'client_secret' => 'you_client_provided_secret'
        ]
    ]
],
```
