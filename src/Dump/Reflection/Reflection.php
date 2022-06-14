<?php

namespace Dump\Reflection;

/**
 * PHP Reflection helpers
 */
class Reflection
{
    public static function classMethodExist(string $class, string $method): bool
    {
        return class_exists($class) && method_exists($class, $method);
    }
}
