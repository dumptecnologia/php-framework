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
        if (enum_exists($class)) {
            return class_exists($class) && method_exists($class::cases()[0], $method);
        }

        return class_exists($class) && method_exists($class, $method);
    }

    /**
     * Checks if the class or enum instance of
     *
     * @param string|object $class
     * @param string $interface
     * @return bool
     */
    public static function instanceOf(string|object $class, string $interface): bool
    {
        if (enum_exists($class)) {
            return $class::cases()[0] instanceof $interface;
        }

        return $class instanceof $interface;
    }


    /**
     * Checks if the class or enum don't instance of
     * @see instanceOf
     */
    public static function dontInstanceOf(string|object $class, string $interface): bool
    {
        return !static::instanceOf($class, $interface);
    }
}
