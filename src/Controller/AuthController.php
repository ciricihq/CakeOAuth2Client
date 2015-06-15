<?php

namespace OAuth2Client\Controller;

use App\Controller\AppController;
use OAuth2Client\Auth\OAuth2Authenticate;

class AuthController extends AppController
{
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
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

    public function logout()
    {
        $this->Auth->setUser(null);
        return $this->redirect($this->Auth->redirectUrl('/'));
    }

    public function refreshToken($refresh_token)
    {
        $this->layout = "ajax.ctp";

        $oauth2_auth = new OAuth2Authenticate();
        $this->set($oauth2_auth);
    }

    public function isAuthorized()
    {
        return true;
    }
}
