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
}
