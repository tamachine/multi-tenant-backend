<?php

namespace App\Helpers;

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
     * Get the fallback code language
     *
     * @return string
     */
    public static function defaultCode()
    {
        return config('app.fallback_locale');
    }

    /**
     * Get the falllanguage session
     *
     * @return string
     */
    public static function session()
    {

    }
}
