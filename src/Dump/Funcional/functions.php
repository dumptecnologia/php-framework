<?php

if (!function_exists('every')) {
    /**
     * Returns true if every value in the collection passes the callback truthy test. Opposite of Functional\none().
     * Callback arguments will be element, index, collection
     * @ref https://github.com/lstrojny/functional-php/blob/main/docs/functional-php.md#every--invoke
     */
    function every(array|\Traversable $collection, ?callable $callback = null): bool
    {
        return \Functional\every($collection, $callback);
    }
}
