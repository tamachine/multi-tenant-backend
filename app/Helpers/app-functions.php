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
        return 20;
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

if (!function_exists('dehash')) {
    /**
     * Dehash a hashid ID
     *
     * @param  string    $hashid
     * @return integer
     */
    function dehash($hashid)
    {
        $hashidArray = app('hashids')->decode($hashid);
        return !empty($hashidArray) ? $hashidArray[0] : null;
    }
}

if (!function_exists('hours_dropdown')) {
    /**
     * Returns an array for hours dropdowns
     *
     * @return array
     */
    function hours_dropdown()
    {
        $hours = [];
        $start = now()->startOfDay();
        $end = now()->endOfDay();

        while($start < $end) {
            $hours[] = $start->format('H:i');
            $start->addMinutes(30);
        }

        return $hours;
    }
}
