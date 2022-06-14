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
}