<?php

namespace App\Helpers;

use App\Services\PreferredLanguage\ApplyPreferredLanguageToLanguageSession;

class Language
{        
    /**
     * Get the avaiable languages
     *
     * @return array
     */
    public static function availableLanguages()
    {
        return config('languages');
    }

    /**
     * Get the code languages
     *
     * @return array
     */
    public static function availableCodes()
    {
        return array_keys(config('languages'));
    }

    /**
     * Check if code is one of the available locale codes
     * 
     * @return boolean
     */
    public static function isAvailableCode($code) 
    {
        return in_array($code, self::availableCodes());
    }

    /**
     * Get the fallback code language
     *
     * @return string
     */
    public static function defaultCode()
    {
        return config('app.fallback_locale');
    }

    /**
     * Get the language session
     *
     * @return string
     */
    public static function getSession()
    {        
        app()->make(ApplyPreferredLanguageToLanguageSession::class);
        
        if(request()->session()->has(self::getSessionName())){
            return request()->session()->get(self::getSessionName());
        }
    }

    protected static function getSessionName() {
        return 'applocale';
    }

    /**
     * Set the language session
     *     
     */
    public static function setSession($value)
    {
        session([self::getSessionName() => $value]);
    }

     /**
     * Set language in session
     *     
     */
    public static function setLanguageInSession($code)
    {
        if(in_array($code, self::availableCodes())) {
            self::setSession($code);            
        }
    }
}
