<?php

namespace OAuth2Client\Auth;

use Cake\Auth\BaseAuthenticate;
use Cake\Core\Configure;
use Cake\Network\Http\Client;
use Cake\Network\Request;
use Cake\Network\Response;
use Cake\Event\EventListenerInterface;
use Cake\Network\Session;

class OAuth2Authenticate implements EventListenerInterface
{
    public function authenticate(Request $request, Response $response)
    {
        $user_login['username'] = $request->data['username'];
        $user_login['password'] = $request->data['password'];

        $token_values = $this->getAccessToken($user_login);

        if (isset($token_values['access_token'])) {
            return $token_values;
        }

        return false;
    }

    public function unauthenticated()
    {
        return false;
    }

    public function getUser()
    {
        $user = Configure::read('Session');
        if ($user) {
            return $user;
        }

        return false;
    }

    public function implementedEvents()
    {
        return [];
    }

    public function getAccessToken($user_login)
    {
        $result = array();
        $routes = $this->getOAuthRoutes();
        $keys = $this->getOAuthKeys();

        $parameters = array_merge($user_login, $keys, ['grant_type' => 'password']);

        $http = new Client();
        $response = $http->post($routes['base_uri'] . $routes['access_token_path'],
            $parameters
        );

        $result = $response->json;

        return $result;
    }

    public function getRefreshToken($refresh_token)
    {
        $result = array();
        $routes = $this->getOAuthRoutes();
        $keys = $this->getOAuthKeys();

        $parameters = array_merge(['refresh_token' => $refresh_token], $keys, ['grant_type' => 'refresh_token']);

        $http = new Client();
        $response = $http->post($routes['base_uri'] . $routes['refresh_token_path'],
            $parameters
        );

        $result = $response->json;

        return $result;
    }

    public function getOAuthRoutes()
    {
        return Configure::read('App.OAuth2Client.routes');
    }

    public function getOAuthKeys()
    {
        return Configure::read('App.OAuth2Client.keys');
    }
}
