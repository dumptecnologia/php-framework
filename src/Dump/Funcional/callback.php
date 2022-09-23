<?php

if (!function_exists('retry')) {
    /**
     * Retry a callback until the number of retries are reached or the callback does no longer throw an exception
     */
    function retry(callable $callback, int $retries, ?\Traversable $delaySequence = null): array
    {
        return \Functional\retry($callback, $retries, $delaySequence);
    }
}

if (!function_exists('tap')) {
    /**
     * Call the given Closure with the given value, then return the value.
     */
    function tap(mixed  $value, callable $callback): mixed
    {
        return \Functional\tap($value, $callback);
    }
}
