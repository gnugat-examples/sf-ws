<?php
// File: tests/Controller/ProfileCreationControllerTest.php

namespace AppBundle\Tests\Controller;

use Symfony\Component\HttpFoundation\Request;

class ProfileCreationControllerTest extends \PHPUnit_Framework_TestCase
{
    private $app;

    protected function setUp()
    {
        $this->app = new \AppKernel('test', false);
        $this->app->boot();
    }

    public function testItCreatesProfiles()
    {
        $headers = array(
            'CONTENT_TYPE' => 'application/json',
            'PHP_AUTH_USER' => 'spanish_inquisition',
            'PHP_AUTH_PW' => 'NobodyExpectsIt!',
        );
        $body = json_encode(array('name' => 'Fawlty Towers'));
        $request = Request::create('/api/v1/profiles', 'POST', array(), array(), array(), $headers, $body);

        $response = $this->app->handle($request);

        $this->assertSame(201, $response->getStatusCode(), $response->getContent());
    }
}
