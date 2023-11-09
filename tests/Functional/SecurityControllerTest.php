<?php 

namespace App\tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class SecurityControllerTest extends WebTestCase
{

    public function testDisplayLogin()
    {
     
        $client = static::createClient();
        $client->request(method: 'GET', uri: '/login');
        $this->assertResponseStatusCodeSame(expectedCode:Response::HTTP_OK);
        $this->assertSelectorTextContains('h1', 'Se connecter');


    }
    public function testLoginWithBadCredentials()
    {
     
        $client = static::createClient();
       $crawler =  $client->request(method: 'GET', uri: '/login');
       $form = $crawler->selectButton('Se connecter')->form([
        'email'=>'hakim@gmail.fr',
        'password'=>'12345'
       ]);
        $client->submit($form);
        $this->assertResponseRedirects('/login');
        $client->followRedirect();
        $this->assertSelectorExists('.alert.alert-danger');
     


    }
    public function testSuccessfullLogin()
    {
     
        $client = static::createClient();
       $crawler =  $client->request(method: 'GET', uri: '/login');
       $form = $crawler->selectButton('Se connecter')->form([
        'email'=>'barthelemy.sophie@sfr.fr',
        'password'=>'aaaa'
       ]);
        $client->submit($form);
        $this->assertResponseRedirects('/');
        $client->followRedirect();
        $this->assertSelectorTextContains('h1', 'bienvenu sur mon blog');

    }


}   