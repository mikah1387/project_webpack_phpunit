<?php

namespace App\Tests\Unit;

use App\Entity\Articles;
use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ArticlesTest extends KernelTestCase
{ 
     public function getEntity()
     {
        $user = static::getContainer()->get('doctrine.orm.entity_manager')->find(Users::class,1);
        return (new Articles())->setTitle('article1')
                             ->setContent('desc')
                             ->setUsers($user)
                             ->setCreatedAt(new \DateTimeImmutable());
     }
     
    public function testEntityArticles(): void
    {
        self::bootKernel();
        $container = static::getContainer();
      
        $article = $this->getEntity();
        $errors= $container->get('validator')->validate($article);
        $this->assertCount(0, $errors);
      
    }
}
