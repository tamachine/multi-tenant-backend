<?php

/**
 * Gathering place for any little helper functions focused on the app backend
 * (rather than the blade templates). This file is autoloaded by composer.json
 */


if (!function_exists('perPage')) {
    /**
     * Returns the total number of results per page for the app
     */
    function perPage(): int
    {
        return 25;
    }
}

if (!function_exists('recursivelyCollect')) {
    /**
     * Recursively collect all arrays/objects into collections
     *
     * @param      mixed          $item   An item to check
     *
     * @return     string|object
     */
    function recursivelyCollect($item)
    {
        if ($item instanceof \Carbon\Carbon) {
            return $item;
        }

        if (is_object($item) || is_array($item)) {
            $item = collect($item);
            $item->transform(
                function ($item) {
                    return recursivelyCollect($item);
                }
            );
        }

        return $item;
    }
}

if (!function_exists('emptyOrNull')) {

    /**
     * Check if the item provided is empty or null
     *
     * @param      mixed  $value
     *
     * @return     boolean
     */
    function emptyOrNull($value = null)
    {
        if (is_bool($value) || is_numeric($value)) {
            return false;
        }

        if ($value instanceof \Illuminate\Support\Collection) {
            return $value->isEmpty();
        }

        if (is_object($value) || is_array($value)) {
            return count($value) == 0;
        }

        return is_null($value) || trim($value) == '';
    }
}
