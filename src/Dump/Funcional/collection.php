<?php

if (!function_exists('contains')) {
    /**
     * Returns true if the collection contains the given value. If the third parameter is
     * true values will be compared in strict mode
     */
    function contains(array|\Traversable $collection, mixed $value, bool $strict = true): bool
    {
        return \Functional\contains($collection, $value, $strict);
    }
}

if (!function_exists('each')) {
    /**
     * Iterates over a collection of elements, yielding each in turn to a callback function. Each invocation of $callback
     * is called with three arguments: (element, index, collection)
     */
    function each(array|\Traversable $collection, callable $callback): void
    {
        \Functional\each($collection, $callback);
    }
}

if (!function_exists('every')) {
    /**
     * Returns true if every value in the collection passes the callback truthy test. Opposite of none().
     * Callback arguments will be element, index, collection
     */
    function every(array|\Traversable $collection, callable $callback): bool
    {
        return \Functional\every($collection, $callback);
    }
}

if (!function_exists('false')) {
    /**
     * Returns true if all elements of the collection are strictly false
     */
    function false(array|\Traversable $collection): bool
    {
        return \Functional\false($collection);
    }
}

if (!function_exists('falsy')) {
    /**
     * Returns true if all elements of the collection evaluate to false
     */
    function falsy(array|\Traversable $collection): bool
    {
        return \Functional\falsy($collection);
    }
}

if (!function_exists('filter')) {
    /**
     * Alias of select
     */
    function filter(array|\Traversable $collection, callable $callback): array
    {
        return \Functional\select($collection, $callback);
    }
}

if (!function_exists('first')) {
    /**
     * Looks through each element in the collection, returning the first one that passes a truthy test (callback). The
     * function returns as soon as it finds an acceptable element, and doesn't traverse the entire collection. Callback
     * arguments will be element, index, collection
     */
    function first(array|\Traversable $collection, ?callable $callback = null): mixed
    {
        return \Functional\first($collection, $callback);
    }
}

if (!function_exists('first_index_of')) {
    /**
     * Returns the first index holding specified value in the collection. Returns false if value was not found
     */
    function first_index_of(array|\Traversable $collection, mixed $value): mixed
    {
        return \Functional\first_index_of($collection, $value);
    }
}

if (!function_exists('flatten')) {
    /**
     * Takes a nested combination of collections and returns their contents as a single, flat array.
     * Does not preserve indexes.
     */
    function flatten(array|\Traversable $collection): array
    {
        return \Functional\flatten($collection);
    }
}

if (!function_exists('invoke')) {
    /**
     * Calls the method named by $methodName on each value in the collection. Any extra arguments passed to invoke will be
     * forwarded on to the method invocation
     */
    function invoke(array|\Traversable $collection, string $methodName, array $arguments = []): array
    {
        return \Functional\invoke($collection, $methodName, $arguments);
    }
}

if (!function_exists('map')) {
    /**
     * Produces a new array of elements by mapping each element in collection through a transformation function (callback).
     * Callback arguments will be element, index, collection
     */
    function map(array|\Traversable $collection, callable $callback): array
    {
        return \Functional\map($collection, $callback);
    }
}

if (!function_exists('none')) {
    /**
     * Returns false if every value in the collection passes the callback truthy test. Opposite of every().
     * Callback arguments will be element, index, collection
     */
    function none(array|\Traversable $collection, callable $callback): bool
    {
        return \Functional\none($collection, $callback);
    }
}

if (!function_exists('pluck')) {
    /**
     * Extract a property from a collection of objects.
     */
    function pluck(array|\Traversable $collection, string $propertyName): array
    {
        return \Functional\pluck($collection, $propertyName);
    }
}

if (!function_exists('reject')) {
    /**
     * Returns the elements in list without the elements that the truthy test (callback) passes. The opposite of
     * select(). Callback arguments will be element, index, collection
     */
    function reject(array|\Traversable $collection, callable $callback): array
    {
        return \Functional\reject($collection, $callback);
    }
}

if (!function_exists('select')) {
    /**
     * Retry a callback until the number of retries are reached or the callback does no longer throw an exception
     */
    function select(array|\Traversable $collection, callable $callback): array
    {
        return \Functional\select($collection, $callback);
    }
}

if (!function_exists('some')) {
    /**
     * Returns true if some of the elements in the collection pass the callback truthy test. Short-circuits and stops
     * traversing the collection if a truthy element is found. Callback arguments will be value, index, collection
     */
    function some(array|\Traversable $collection, callable $callback): bool
    {
        return \Functional\some($collection, $callback);
    }
}

if (!function_exists('true')) {
    /**
     * Returns true if all elements of the collection are strictly true
     */
    function true(array|\Traversable $collection): bool
    {
        return \Functional\true($collection);
    }
}

if (!function_exists('truthy')) {
    /**
     * Returns true if all elements of the collection are strictly true
     */
    function truthy(array|\Traversable $collection): bool
    {
        return \Functional\truthy($collection);
    }
}

if (!function_exists('array_value_recursive')) {
    /**
     * Retrieves values from a multidimensional array, either by key or all values.
     */
    function array_value_recursive(array $arr, ?string $key = null): array
    {
        $val = [];

        array_walk_recursive($arr, function ($v, $k) use ($key, &$val) {
            $key && $k != $key ?: $val[] = $v;
        }) ?: throw new Exception('array_value_recursive returns false.');

        return $val;
    }
}

if (!function_exists('array_dot')) {
    /**
     * Flatten a multi-dimensional associative array with dots.
     * @ref https://laravel.com/docs/10.x/helpers#method-array-dot
     */
    function array_dot(iterable $arr, $prepend = ''): array
    {
        $results = [];

        foreach ($arr as $key => $value) {
            if (is_array($value) && ! empty($value)) {
                $results = array_merge($results, array_dot($value, $prepend.$key.'.'));
            } else {
                $results[$prepend.$key] = $value;
            }
        }

        return $results;
    }
}

if (!function_exists('array_undot')) {
    /**
     * Convert a flatten "dot" notation array into an expanded array.
     * @ref https://laravel.com/docs/10.x/helpers#method-array-undot
     */
    function array_undot(iterable $arr): array
    {
        /**
         * Set an array item to a given value using "dot" notation.
         * If no key is given to the method, the entire array will be replaced.
         *
         * @ref https://laravel.com/docs/10.x/helpers#method-array-set
         */
        function set(array &$array, int|string|null $key, mixed $value): array
        {
            if (is_null($key)) {
                return $array = $value;
            }

            $keys = explode('.', $key);

            foreach ($keys as $i => $key) {
                if (count($keys) === 1) {
                    break;
                }

                unset($keys[$i]);

                // If the key doesn't exist at this depth, we will just create an empty array
                // to hold the next value, allowing us to create the arrays to hold final
                // values at the correct depth. Then we'll keep digging into the array.
                if (! isset($array[$key]) || ! is_array($array[$key])) {
                    $array[$key] = [];
                }

                $array = &$array[$key];
            }

            $array[array_shift($keys)] = $value;

            return $array;
        }

        $results = [];

        foreach ($arr as $key => $value) {
            set($results, $key, $value);
        }

        return $results;
    }
}
