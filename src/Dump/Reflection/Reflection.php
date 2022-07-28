<?php

namespace Dump\Reflection;

/**
 * PHP Reflection helpers
 */
class Reflection
{
	
	/**
	 * rewrite the default method to include the enum type
	 *
	 * @param string $class
	 * @param string $method
	 * @return bool
	 */
	public static function classMethodExist(string $class, string $method): bool
	{
		if (self::enumExists($class)) {
			return class_exists($class) && method_exists($class::cases()[0], $method);
		}
		
		return class_exists($class) && method_exists($class, $method);
	}
	
	/**
	 * Checks if the class or enum instance of
	 *
	 * @param mixed $class
	 * @param string $interface
	 * @return bool
	 */
	public static function instanceOf(mixed $class, string $interface): bool
	{
		if (self::enumExists($class)) {
			return $class::cases()[0] instanceof $interface;
		}
		
		return $class instanceof $interface;
	}
	
	
	/**
	 * Checks if the class or enum don't instance of
	 * @see instanceOf
	 */
	public static function dontInstanceOf(mixed $class, string $interface): bool
	{
		return !static::instanceOf($class, $interface);
	}
	
	/**
	 * Checks if the enum has been defined
	 * @param mixed $class
	 * @return bool
	 */
	private static function enumExists(mixed $class): bool
	{
		return is_string($class) && enum_exists($class);
	}
}
