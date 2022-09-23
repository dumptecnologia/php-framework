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
