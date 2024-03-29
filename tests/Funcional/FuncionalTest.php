<?php

namespace Dump\Tests\Funcional;

use PHPUnit\Framework\TestCase;

class FuncionalTest extends TestCase
{
    public function test_every()
    {
        $this->assertEquals(every([1, 2, 3], fn () => true), \Functional\every([1, 2, 3], fn () => true));
    }

    public function test_to_bool()
    {
        $this->assertTrue(to_bool('on'));
        $this->assertTrue(to_bool('1'));
        $this->assertTrue(to_bool(1));
        $this->assertTrue(to_bool('true'));

        $this->assertFalse(to_bool('off'));
        $this->assertFalse(to_bool('0'));
        $this->assertFalse(to_bool(0));
        $this->assertFalse(to_bool(''));
        $this->assertFalse(to_bool(' '));
        $this->assertFalse(to_bool('false'));
    }

    public function test_to_str()
    {
        $this->assertEquals('1', to_str(1));
        $this->assertEquals('0', to_str(0));
        $this->assertEquals('1', to_str(true));
        $this->assertEquals('0', to_str(false));
        $this->assertEquals('1.23', to_str(1.23));
        $this->assertEquals('-1', to_str(-1));
        $this->assertEquals('-1.23', to_str(-1.23));
        $this->assertEquals('abc', to_str('abc'));
    }

    public function test_throw_to_array()
    {
        $exception = new \Exception('error test_throw_to_array');
        $throwArray = throw_to_array($exception);

        $this->assertIsArray($throwArray);
        $this->assertArrayHasKey('message', $throwArray);
        $this->assertArrayHasKey('trace', $throwArray);
        $this->assertIsArray($throwArray['trace']);
    }

    public function test_throw_to_string()
    {
        $exception = new \Exception('error test_throw_to_string');
        $throwString = throw_to_string($exception);

        $this->assertIsString($throwString);
        $this->assertStringContainsString("message: error test_throw_to_string", $throwString);
        $this->assertStringContainsString("[trace]", $throwString);
    }

    public function test_array_value_recursive()
    {
        $arr1 = [];
        $arr2 = [[0, 1, 2], [3, 4, 5]];
        $arr3 = [['a' => 0, 'b' => 1, 'c' => 2], ['a' => 3, 'b' => 4, 'c' => 5]];
        $arr4 = [['a' => 0, 'b' => 1, 'c' => 2], ['a' => 3, 'b' => 4, 'c' => 5], ['d' => 6, ['a' => 7]], 'a' => 8];

        $this->assertEquals([], array_value_recursive($arr1));
        $this->assertEquals([0, 1, 2, 3, 4, 5], array_value_recursive($arr2));
        $this->assertEquals([0, 1, 2, 3, 4, 5], array_value_recursive($arr3));
        $this->assertEquals([0, 3], array_value_recursive($arr3, 'a'));
        $this->assertEquals([0, 3, 7, 8], array_value_recursive($arr4, 'a'));
        $this->assertEquals([6], array_value_recursive($arr4, 'd'));
    }
}
