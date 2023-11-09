<?php

namespace App\Tests\Unit;

use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserRepoTest extends KernelTestCase
{
    public function testCount(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $users = $container->get(UsersRepository::class)->count([]);
        $this->assertEquals(10,$users);
       
    }
}
