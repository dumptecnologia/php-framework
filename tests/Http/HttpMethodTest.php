<?php

namespace Dump\Tests\Http;

use Dump\Http\Method;
use PHPUnit\Framework\TestCase;

class HttpMethodTest extends TestCase
{
	public function test_can_get_a_method_http_name()
	{
		$this->assertSame('GET', Method::GET->name());
		$this->assertSame('PATCH', Method::PATCH->name());
		$this->assertSame('HEAD', Method::HEAD->name());
	}
}
