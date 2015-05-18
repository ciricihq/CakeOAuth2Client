<?php

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;
use Cake\Routing\Router;

class AuthControllerTest extends IntegrationTestCase
{
    public function testLogin()
    {
        $this->get('/oauth2/login');
        $this->assertResponseOk();
    }
}
