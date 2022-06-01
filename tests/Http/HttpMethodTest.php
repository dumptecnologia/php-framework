<?php

namespace Dump\Tests\Http;

use Dump\Http\Method;
use Dump\Http\Status;
use PHPUnit\Framework\TestCase;

class HttpStatusTest extends TestCase
{
    public function testCanGetAMethodHttpName()
    {
        $this->assertSame('GET', Method::GET->name());
        $this->assertSame('PATCH', Method::PATCH->name());
        $this->assertSame('HEAD', Method::HEAD->name());
    }
}
