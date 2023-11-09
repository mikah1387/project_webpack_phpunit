<?php

namespace App\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BasicTest extends TestCase
{
    public function testAreWorking(): void
    {
        $this->assertTrue(true);
        $this->assertEquals(2, 1+1);
   
    }
}
