<?php

namespace OAuth2Client\Test\TestCase\Auth;

use Cake\TestSuite\TestCase;
use OAuth2Client\Auth\OAuth2Authenticate;

class OAuth2AuthenticateTest extends TestCase
{
    private $oauth_authenticator;

    public function setUp()
    {
        $this->oauth_authenticator = new OAuth2Authenticate();
    }

    public function testGetAccessToken()
    {
        $user_login = [
            'username' => 'apitest',
            'password' => 'hola'
        ];

        $access_token_values = $this->oauth_authenticator->getAccessToken($user_login);

        $this->assertNotNull($access_token_values);
    }

    public function testGetOAuthRoutes()
    {
        $oauth_routes = $this->oauth_authenticator->getOAuthRoutes();
        $this->assertArrayHasKey('base_uri', $oauth_routes);
        $this->assertArrayHasKey('access_token_path', $oauth_routes);
        $this->assertArrayHasKey('refresh_token_path', $oauth_routes);
    }

    public function testGetOAuthKeys()
    {
        $oauth_keys = $this->oauth_authenticator->getOAuthKeys();
        $this->assertArrayHasKey('client_id', $oauth_keys);
        $this->assertArrayHasKey('client_secret', $oauth_keys);
    }
}
