<?php 

namespace App\tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class MainControllerTest extends WebTestCase
{

    public function testMainPage()
    {
     
        $client = static::createClient();
        $client->request(method: 'GET', uri: '/');
        $this->assertResponseStatusCodeSame(expectedCode:Response::HTTP_OK);


    }
    public function testAuthPageISRestricted()
    {
     
        $client = static::createClient();
        $client->request(method: 'GET', uri: '/auth');
        $this->assertResponseRedirects('/login');
        // $this->assertResponseStatusCodeSame(Response::HTTP_UNAUTHORIZED);


    }

    public function testRedirectToLogin()
    {
     
        $client = static::createClient();
        $client->request(method: 'GET', uri: '/auth');
        $this->assertResponseRedirects('/login');


    }
    public function testH1MainPage()
    {
     
        $client = static::createClient();
        $client->request(method: 'GET', uri: '/');
        $this->assertSelectorTextContains('h1', 'bienvenu sur mon blog');


    }

}