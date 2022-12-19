<?php


if (!function_exists('concat')) {
    /**
     * Concatenates zero or more strings
     */
    function concat(string ...$strings): bool
    {
        return \Functional\concat(... $strings);
    }
}

if (!function_exists('random_hex')) {
	/**
	 * Generate a rand string hexadecimal
	 */
	function random_hex(int $length = 16): string
	{
		return str_pad(bin2hex(random_bytes($length)), $length);
	}
}
