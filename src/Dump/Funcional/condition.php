<?php

if (!function_exists('false_if_throw')) {
    /**
     * Return false if an exception is thrown or the result of $callback.
     */
    function false_if_throw(callable $callback): mixed
    {
        try {
            return call_user_func($callback);
        } catch (\Throwable $e) {
            return false;
        }
    }
}
