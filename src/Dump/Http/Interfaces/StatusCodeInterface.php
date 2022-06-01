<?php

namespace Dump\Http\Interfaces;

interface StatusCodeInterface
{
	/**
	 * provide http status message
	 * @return string
	 */
	public function message(): string;
	
	/**
	 * provide http status message with code
	 * @return string
	 */
	public function fullMessage(): string;
	
	/**
	 * provide http status code
	 * @return int
	 */
	public function code(): int;
	
	/**
	 * provide http status message
	 * @param int $code
	 * @return string
	 */
	public static function getMessage(int $code): string;
	
	/**
	 * provide http status message with code
	 * @param int $code
	 * @return string
	 */
	public static function getFullMessage(int $code): string;
	
	/**
	 * provide http status code
	 * @param int $code
	 * @return int
	 */
	public static function getCode(int $code): int;
}