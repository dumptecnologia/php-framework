<?php

if (!function_exists('is_false')) {
	/**
	 * Check if $value is false
	 */
	function is_false(mixed $value): bool
	{
		return $value === false;
	}
}


if (!function_exists('not_empty')) {
	/**
	 * Check if $value is !empty
	 */
	function not_empty(mixed $value): bool
	{
		return !empty($value);
	}
}

if (!function_exists('is_json')) {
	/**
	 * Check if string is valid json
	 */
	function is_json(string $string): bool
	{
		json_decode($string);

		return empty(json_last_error());
	}
}