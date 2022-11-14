<?php

/**
 * Gathering place for any little helper functions focused on the app frontend.
 * This file is autoloaded by composer.json
 */


if (!function_exists('longRentalDays')) {
    /**
     * Returns the label for long rentals
     *
     * @param      integer  $days  The number of days
     * @return     string
     */
    function longRentalDays($days)
    {
        switch ($days) {
            case 1:
                return "1 day";

            case 20:
                return "20+ days";

            default:
                return $days . " days";
        }
    }
}

if (!function_exists('earlyBirdMonths')) {
    /**
     * Returns the label for early bird rentals
     *
     * @param      integer  $months  The number of months
     * @return     string
     */
    function earlyBirdMonths($months)
    {
        switch ($months) {
            case 1:
                return "1 months";

            case 10:
                return "10+ months";

            default:
                return $months . " months";
        }
    }
}
