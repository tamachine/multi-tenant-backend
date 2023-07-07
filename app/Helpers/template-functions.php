<?php

/**
 * Gathering place for any little helper functions focused on the app frontend.
 * This file is autoloaded by composer.json
 */

 if (!function_exists('selectedCurrency')) {
    /**
     * Returns the selected currency
     *
     * @return     string
     */
    function selectedCurrency()
    {
        return session('currency') !== null ? session('currency') : config('settings.default_currency');
    }
 }

 if (!function_exists('formatPrice')) {
    /**
     * Format the price according to the currency in session
     *
     * @param      int      $price
     * @param      string   $defaultCurrency
     * @return     string
     */
    function formatPrice($price, $defaultCurrency = null)
    {
        if ($defaultCurrency) {
            $currency = $defaultCurrency;
        } else {
            $currency = session('currency') !== null ? session('currency') : config('settings.default_currency');
        }

        $locale = session('applocale') !== null ? session('applocale') : 'en';

        // El precio puede ser un string
        if (is_string($price)) {
            $price = intval(preg_replace("/[^0-9]/", "", $price));
        }

        $api = new \App\Apis\OpenExchangeRates\Api;
        $rates = $api->getRates();
        $fmt = new NumberFormatter($locale, NumberFormatter::CURRENCY);

        switch ($currency) {
            case 'EUR':
                $rate = $rates["EUR"] / $rates["ISK"];
                $fmt->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, 2);
                break;

            case 'GBP':
                $rate = $rates["GBP"] / $rates["ISK"];
                $fmt->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, 2);
                break;

            case 'USD':
                $rate = 1 / $rates["ISK"];
                $fmt->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, 2);
                break;

            default:
                $rate = 1;
                $fmt->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, 0);
                break;
        }

        $price = round(intval($price) * $rate, 2);

        return $fmt->formatCurrency($price, $currency);
    }
 }

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

if (!function_exists('getBreadcrumb')) {

    function getBreadcrumb($routes = []) {
        $breadcrumbs = new App\Services\Breadcrumbs\Breadcrumbs();
        $breadcrumb = [];

        foreach($routes as $route) {            
            $currentBreadcrumb = $breadcrumbs->getBreadcrumbByRoute($route);
            
            if (!$currentBreadcrumb) {
                $currentBreadcrumb = new App\Services\Breadcrumbs\Breadcrumb();
                $currentBreadcrumb->setText($route);
                $currentBreadcrumb->setLink('#');
            }

            $breadcrumb[] = $currentBreadcrumb;
        }

        return $breadcrumb;
    }
}


if (!function_exists('checkSessionCar')) {
    /**
     * Check if we have an active search session in the car list.
     * If so, delete the car, insurances & extras info
     * If not, we create one
     *
     * @return void
     */
    function checkSessionCar()
    {            
        $dates = CarSearchInitialValues::getDates();
        
        $locations = CarSearchInitialValues::getLocations();

        $locationFrom = App\Models\Location::where('hashid', '=', $locations['pickup'])->first();
        $locationTo   = App\Models\Location::where('hashid', '=', $locations['dropoff'])->first();

        $data = [
            'from'              => $dates['from'],
            'to'                => $dates['to'],
            'pickup'            => $locationFrom->hashid,
            'pickup_name'       => $locationFrom->name,
            'pickup_caren_id'   => $locationFrom->caren_settings ? $locationFrom->caren_settings["caren_pickup_location_id"] : null,
            'dropoff'           => $locationTo->hashid,
            'dropoff_name'      => $locationTo->name,
            'dropoff_caren_id'  => $locationTo->caren_settings ? $locationTo->caren_settings["caren_dropoff_location_id"] : null,
        ];       

        unset($data['car']);
        unset($data['insurances']);
        unset($data['extras']);

        request()->session()->put('booking_data', $data);        
    }
}

if (!function_exists('checkSessionInsurances')) {
    /**
     * Inruances screen: We must have dates, locations and a car selected
     *
     * @return bool
     */
    function checkSessionInsurances()
    {
        if(!request()->session()->has('booking_data')) {
            return false;
        }

        $data = request()->session()->get('booking_data');

        if (!isset($data['from'])
            || !isset($data['to'])
            || !isset($data['pickup'])
            || !isset($data['dropoff'])
            || !isset($data['car'])
        ) {
            return false;
        }

        unset($data['insurances']);
        unset($data['extras']);

        request()->session()->put('booking_data', $data);

        return true;
    }
}

if (!function_exists('checkSessionExtras')) {
    /**
     * Extras screen: We must have dates, locations, a car and an insurance selected
     *
     * @return bool
     */
    function checkSessionExtras()
    {
        if(!request()->session()->has('booking_data')) {
            return false;
        }

        $data = request()->session()->get('booking_data');

        if (!isset($data['from'])
            || !isset($data['to'])
            || !isset($data['pickup'])
            || !isset($data['dropoff'])
            || !isset($data['car'])
            || !isset($data['insurances'])
        ) {
            return false;
        }

        unset($data['extras']);
        request()->session()->put('booking_data', $data);

        return true;
    }
}

if (!function_exists('checkSessionPayment')) {
    /**
     * Extras screen: We must have dates, locations, car, insurances and extras selected
     *
     * @return bool
     */
    function checkSessionPayment()
    {
        if(!request()->session()->has('booking_data')) {
            return false;
        }

        $data = request()->session()->get('booking_data');

        if (!isset($data['from'])
            || !isset($data['to'])
            || !isset($data['pickup'])
            || !isset($data['dropoff'])
            || !isset($data['car'])
            || !isset($data['insurances'])
            || !isset($data['extras'])
        ) {
            return false;
        }

        return true;
    }
}

if (!function_exists('bookingDays')) {
    /**
     * The number of days a vehicle is booked
     *
     * @return     int
     */
    function bookingDays()
    {
        $sessionData = request()->session()->get('booking_data');
        return ceil($sessionData['from']->floatDiffInRealDays($sessionData['to']));
    }
}

if (!function_exists('bookingPickupLocation')) {
    /**
     * It returns the booking pickup location
     *
     * @return     string
     */
    function bookingPickupLocation()
    {
        $sessionData = request()->session()->get('booking_data');
        return $sessionData['pickup_name'];
    }
}

if (!function_exists('bookingDropoffLocation')) {
    /**
     * It returns the booking dropoff location
     *
     * @return     string
     */
    function bookingDropoffLocation()
    {
        $sessionData = request()->session()->get('booking_data');
        return $sessionData['dropoff_name'];
    }
}

if (!function_exists('bookingInsurances')) {
    /**
     * It returns the booking insurances
     *
     * @return     array
     */
    function bookingInsurances()
    {
        $sessionData = request()->session()->get('booking_data');
        return $sessionData['insurances'];
    }
}

if (!function_exists('validateCarSearchData')) {
    /**
     * Check if we have an active search session in the car list.
     * If so, delete the car, insurances & extras info
     * If not, we create one
     *
     * @return void
     */
    function validateCarSearchData($dateFrom, $dateTo)
    {
        if($dateFrom) {
            if($dateTo) {
                if($dateTo->gt($dateFrom)) {                   
                    if($dateFrom->copy()->startOfDay()->diffInDays(Carbon\Carbon::today()->startOfDay()) >= 1){
                        return true;
                    }
                }
            }
        }

        return false;
    }
}