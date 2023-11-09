<?php

namespace App\Tests\Unit;

use App\Entity\Users;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserEntityTest extends KernelTestCase
{
    public function getEntityUser()
    {   return (new Users)
        ->setLastname('')
        ->setFirstname('achache')
        ->setRoles(['ROLE_USER'])
        ->setAdresse('13009')
        ->setEmail('hakim@email.fr')
        ->setPassword('aaaa');
    }
     public function assertUser($entity, int $number)
    {
        self::bootKernel();
        $container = static::getContainer();
        $errors = $container->get('validator')->validate($entity);
        $messages=[];
        foreach ($errors as $error) {
            $messages[]= $error->getPropertyPath(). ' => ' . $error->getMessage();

        }
        $this->assertCount($number,$errors, implode(',',$messages));
    }

    public function testValidEntity(): void
    {
         
         $this->assertUser($this->getEntityUser(),0);               
    }
    public function testInValidEntity(): void
    {
        
         $this->assertUser($this->getEntityUser()->setLastname(''),1);               
                       
         $this->assertUser($this->getEntityUser()->setEmail('achache@gmail.com'),0);               
                       
                     
         
    }

  
}
