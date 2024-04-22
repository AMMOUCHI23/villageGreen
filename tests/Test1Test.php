<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class Test1Test extends TestCase
{
    public function testSomething(): void
    {
        $a=2;
        $b=4;
        
        $this->assertEquals(6, $a+$b);
        
    }
}
