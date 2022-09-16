<?php

if (!function_exists('every')) {
    /**
     * Returns true if every value in the collection passes the callback truthy test. Opposite of Functional\none().
     * Callback arguments will be element, index, collection
     */
    function every(array|\Traversable $collection, ?callable $callback = null): bool
    {
        return \Functional\every($collection, $callback);
    }
}

if (!function_exists('none')) {
    /**
     * Returns false if every value in the collection passes the callback truthy test. Opposite of Functional\every().
     * Callback arguments will be element, index, collection
     */
    function none(array|\Traversable $collection, ?callable $callback = null): bool
    {
        return \Functional\none($collection, $callback);
    }
}

