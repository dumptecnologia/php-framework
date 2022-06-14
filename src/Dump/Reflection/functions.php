<?php

use Dump\Reflection\Reflection;

if (!function_exists('class_method_exists')) {
    /**
     * Checks if the class and method has been defined
     */
    function class_method_exists(string $class, string $method): bool
    {
        return Reflection::classMethodExist($class, $method);
    }
}
