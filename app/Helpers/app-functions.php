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
if (!function_exists('str_replace_last')) {
    /**
     * Replaces the last ocurrence of a string in a string
     *
     * @param  string $search The string that has to be replaced
     * @param  string $replace The string that replaces the search
     * @param  string $str The string where we have to replace strings
     * @return string   
     */
    function str_replace_last( $search , $replace , $str ) {
        if( ( $pos = strrpos( $str , $search ) ) !== false ) {
            $search_length = strlen( $search );
            $str = substr_replace( $str , $replace , $pos , $search_length );
        }
        return $str;
    }
}

if (!function_exists('collectConfig')) {
    /**
     * Return a config as a collection
     *
     * @param      string   $path
     * @param      boolean  $recursive  True returns a recursive collection
     *
     * @return     object   Illuminate\Support\Collection
     */
    function collectConfig($path, $recursive = false)
    {
        if ($recursive) {
            return recursivelyCollect(config($path));
        }

        return collect(config($path));
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

if (!function_exists('translate_caren_fuelname')) {
    /**
     * Translate Caren fuel name into the "engine" names in config/car-specs
     *
     * @param   string  $fuelName
     *
     * @return  string
     */
    function translate_caren_fuelname($fuelName)
    {
        switch(strtolower($fuelName)) {
            case 'gasoline':
                return 'gas';

            case 'diesel':
                return 'diesel';

            case 'electric':
                return 'electric';

            default:
                return '';
        }
    }
}

if (!function_exists('translate_caren_transmission')) {
    /**
     * Translate Caren transmission name into the "transmission" names in config/car-specs
     *
     * @param   string  $transmission
     *
     * @return  string
     */
    function translate_caren_transmission($transmission)
    {
        switch(strtolower($transmission)) {
            case 'automatic':
                return 'auto';

            case 'manual':
                return 'manual';

            default:
                return '';
        }
    }
}

if (!function_exists('translate_caren_road')) {
    /**
     * Translate Caren "DriveName" into the "road" names in config/car-specs
     *
     * @param   string $driveName
     *
     * @return  string
     */
    function translate_caren_road($driveName)
    {
        switch(strtolower($driveName)) {
            case 'fwd':
                return 'fwd';

            case '4wd':
                return '4wd';

            default:
                return '';
        }
    }
}

if (!function_exists('translate_log_fields')) {
    /**
     * Translate the updated fields to be added to the booking log
     *
     * @param   array   $fields
     *
     * @return  string
     */
    function translate_log_fields($fields)
    {
        $translated = [];
        $ignore_fields = ["updated_at", "car_id", "pickup_location", "dropoff_location"];

        foreach (array_keys($fields) as $field) {
            if (!in_array($field, $ignore_fields)) {
                $translated[] = __('log_fields.' . $field);
            }
        }

        return implode(", ", $translated);
    }
}

if (!function_exists('slugify')) {
    /**
     * Slugifies a string
     *
     * @param  string   $title
     * @return string
     */
    function slugify($title)
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    }
}

if (!function_exists('roundUpToMinuteInterval')) {
    /**
     * Round up minutes to the nearest upper interval of a DateTime object.
     * 
     * @param \DateTime $dateTime
     * @param int $minuteInterval
     * @return \DateTime
     */
    function roundUpToMinuteInterval(\DateTime $dateTime, $minuteInterval = 30)
    {
        return $dateTime->setTime(
            $dateTime->format('H'),
            ceil($dateTime->format('i') / $minuteInterval) * $minuteInterval,
            0
        );
    }
}
