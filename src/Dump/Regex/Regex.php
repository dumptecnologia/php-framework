<?php

namespace Dump\Regex;


/**
 * PHP Regex rules
 */
class Regex
{
	const URL = "/^https?:\/\/(localhost|([a-z0-9-]+\.)+[a-z]{2,6}|\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})(:[0-9]+)?(\/?|\/\S+)$/";
	
	public static function validateUrl(string $url): bool
	{
		return preg_match(Regex::URL, $url);
	}
}
