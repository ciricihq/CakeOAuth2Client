<?php

namespace OAuth2Client\Controller;

use App\Controller\AppController;

class AuthController extends AppController
{
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
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

    public function isAuthorized()
    {
        return true;
    }
}
