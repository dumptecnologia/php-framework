<?php

namespace Dump\Tests\Regex;

use Dump\Regex\Regex;
use PHPUnit\Framework\TestCase;

class RegexTest extends TestCase
{
	public function test_url_regex()
	{
		$this->assertMatchesRegularExpression(Regex::URL, 'https://dump.tec.br');
	}
	
	public function test_localhost_url_regex()
	{
		$this->assertMatchesRegularExpression(Regex::URL, 'http://localhost');
	}
	
	public function test_url_regex_validate()
	{
		$this->assertTrue(Regex::validateUrl('https://dump.tec.br'));
	}
	
	public function test_url_regex_validate_fail()
	{
		$this->assertFalse(Regex::validateUrl('https://dump'));
	}
}
