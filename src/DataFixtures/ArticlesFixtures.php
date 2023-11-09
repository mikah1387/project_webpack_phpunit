<?php

namespace App\DataFixtures;

use App\Entity\Articles;
use App\Entity\Users;
use App\Repository\UsersRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ArticlesFixtures extends Fixture implements DependentFixtureInterface 

{

    public function __construct()
    {
    }

    public function load(ObjectManager $manager)
    {
       $faker = Faker\Factory::create('fr_FR');
         
        for ($i=0; $i <10 ; $i++) { 
            $article = new Articles;
            $article->setTitle($faker->title);
            $article->setContent($faker->text(200));
            $user = $this->getReference('user-'.rand(0,9));
            $article->setUsers($user);
            $manager->persist($article);

        }
       

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
              UsersFixtures::class 
        ];
    }
}
