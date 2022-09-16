<?php

namespace Dump\Tests\Funcional;

use PHPUnit\Framework\TestCase;

class FuncionalTest extends TestCase
{
    public function test_every()
    {
        $this->assertEquals(every([1, 2, 3], fn() => true), \Functional\every([1, 2, 3], fn() => true));
    }
}
