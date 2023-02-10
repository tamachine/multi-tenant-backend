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

if (!function_exists('formatPrice')) {
    /**
     * Format the price
     *
     * @param      int      $price      The price
     * @param      string   $currency   The currency
     * @return     string
     */
    function formatPrice($price, $currency)
    {
        switch ($currency) {
            case 'eur':
                $decimals = 2;
                break;

            case 'gbp':
                $decimals = 2;
                break;

            case 'usd':
                $decimals = 2;
                break;

            default:
                $decimals = 0;
                break;
        }

        return number_format($price, $decimals, '.', ',') . " " . strtoupper($currency);
    }
}


if (!function_exists('highlightTerm')) {
    /**
     * highlight the term string in the text
     *
     * @param      string   $text   The text
     * @param      string   $term   The term to be highlighted
     * @return     string
     */
    function highlightTerm($text, $term)
    {
        return str_ireplace($term, "<mark>$term</mark>", $text);
    }
}

if (!function_exists('carenName')) {
    /**
     * Get the field name from a Caren booking json/array
     *
     * @param      string   $value
     * @return     string
     */
    function carenName($value)
    {
        if (str_contains($value, "|")) {
            $values = explode("|", $value);
            return $values[0] . " - " . $values[1];
        } else {
            return $value;
        }
    }
}

if (!function_exists('carenValue')) {
    /**
     * Get the value from a Caren booking json/array
     *
     * @param      array    $caren
     * @param      string   $value
     * @return     string
     */
    function carenValue($caren, $value)
    {
        if (str_contains($value, "|")) {
            $values = explode("|", $value);
            return $caren[$values[0]][$values[1]];
        } else {
            return $caren[$value];
        }
    }
}

if (!function_exists('bookingPickupDate')) {
    /**
     * It returns the booking pickup as "Month day, Year"
     *
     * @return     string
     */
    function bookingPickupDate()
    {
        $sessionData = request()->session()->get('booking_data');
        return $sessionData['from']->isoFormat("MMMM D, Y");
    }
}

if (!function_exists('bookingDropoffDate')) {
    /**
     * It returns the booking dropoff as "Month day, Year"
     *
     * @return     string
     */
    function bookingDropoffDate()
    {
        $sessionData = request()->session()->get('booking_data');
        return $sessionData['to']->isoFormat("MMMM D, Y");
    }
}
