<?php

namespace Dump\Tests\Http;

use Dump\Http\Status;
use PHPUnit\Framework\TestCase;

class HttpStatusTest extends TestCase
{
	public function testCanGetAHttpStatusCode()
	{
		$this->assertSame(200, Status::OK->code());
		$this->assertSame(400, Status::BAD_REQUEST->code());
		$this->assertSame(500, Status::getCode(500));
	}
	
	public function testCanGetAHttpStatusCodeMessage()
	{
		$this->assertSame('OK', Status::OK->message());
		$this->assertSame('Bad Request', Status::BAD_REQUEST->message());
		$this->assertSame('Internal Server Error', Status::getMessage(500));
	}
	
	public function testCanGetAHttpStatusCodeMessageWithCode()
	{
		$this->assertSame('200 OK', Status::OK->fullMessage());
		$this->assertSame('400 Bad Request', Status::BAD_REQUEST->fullMessage());
		$this->assertSame('500 Internal Server Error', Status::getFullMessage(500));
	}
}
