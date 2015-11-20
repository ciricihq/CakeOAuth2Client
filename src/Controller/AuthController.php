<?php

namespace OAuth2Client\Controller;

use App\Controller\AppController;
use OAuth2Client\Auth\OAuth2Authenticate;

class AuthController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Cookie');
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->storeCredentials($user);
                return $this->redirect($this->Auth->redirectUrl('/'));
            } else {
                $this->Flash->error(
                    __('Username or password is incorrect'),
                    'default',
                    [],
                    'auth'
                );
            }
        }
    }

    /**
     * Store the generated credentials,
     * AccessToken in public plain cookie and
     * RefresToken in session to avoid exposing
     */
    private function storeCredentials($user)
    {
        $this->Cookie->config('encryption', false);
        $this->Cookie->configKey('Oauth', 'encryption', false);
        $this->Cookie->write('OAuth.AccessToken', $user['access_token']);
        $session = $this->request->session();
        $session->write('OAuth.RefreshToken', $user['refresh_token']);
        // $this->Cookie->write('OAuth.RefreshToken', $authUser['refresh_token']);
        $this->Cookie->write('OAuth.TokenExpires', $user['expires_in']);
    }

    public function logout()
    {
        $this->Auth->setUser(null);
        return $this->redirect($this->Auth->redirectUrl('/'));
    }

    public function refreshToken()
    {
        $this->viewBuilder()->layout("ajax.ctp");

        $session = $this->request->session();
        $refreshToken = $session->read('OAuth.RefreshToken');

        $oauth2_auth = new OAuth2Authenticate();
        $response = $oauth2_auth->getRefreshToken($refreshToken);

        $this->Auth->setUser($response);
        $this->storeCredentials($response);
    }

    public function isAuthorized()
    {
        return true;
    }
}
