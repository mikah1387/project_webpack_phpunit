<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture

{

    private  $count = 0;
    public function __construct(
        
        private UserPasswordHasherInterface $passwordHacher
        )
    {
    }
    public function load(ObjectManager $manager): void
    {
       $faker = Faker\Factory::create('fr_FR');
         
        for ($i=0; $i <10 ; $i++) { 
            $user = new Users;
            $user->setLastname($faker->lastName);
            $user->setfirstname($faker->firstName);
            $user->setAdresse($faker->streetAddress);
            $user->setEmail($faker->email);
            $user->setPassword($this->passwordHacher->hashPassword($user, 'aaaa'));
            $user->setRoles(['ROLE_USER']);
            $this->setReference('user-'.$this->count, $user);
            $manager->persist($user);
            $this->count++;

        }
       

        $manager->flush();
    }
}
