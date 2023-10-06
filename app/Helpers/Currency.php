<?php

namespace App\Helpers;

use App\Models\Currency as ModelsCurrency;

class Currency
{
    /**
     * Get the session name
     *
     * @return string
     */
    protected static function getSessionName()
    {
        return 'currency';
    }

    /**
     * Initialize the session
     */
    public static function initializeSession()
    {
        if(!request()->session()->has(self::getSessionName())){
            session([self::getSessionName() => config('settings.default_currency')]);
        }
    }

    /**
     * Get the avaiable currencies
     *
     * @return array
     */
    public static function availableCurrencies()
    {
        return ModelsCurrency::pluck('code')->toArray();
    }

    /**
     * Check if code is one of the available locale codes
     *
     * @return boolean
     */
    public static function isAvailableCode($code)
    {
        return in_array($code, self::availableCurrencies());
    }

    /**
     * Set the currency session
     *
     */
    public static function setSession($value)
    {
        session([self::getSessionName() => $value]);
    }

    /**
     * Set currency in session
     *
     */
    public static function setCurrencyInSession($code)
    {
        if(in_array($code, self::availableCurrencies())) {
            self::setSession($code);
        }
    }
}
