<?php

namespace App\Helpers;

use App\Services\PreferredLanguage\ApplyPreferredLanguageToLanguageSession;
use App\Models\Car;

class CarsFilters
{        
    public static function transmissions() {
        return Car::distinct()->get(['transmission'])->pluck('transmission')->toArray();
    }  

    public static function roads() {
        return Car::distinct()->get(['f_roads_name'])->pluck('f_roads_name')->toArray();
    }  
    
    public static function seats() {
        return Car::distinct()->get(['adult_passengers'])->sortBy('adult_passengers')->pluck('adult_passengers')->toArray();
    }  

    public static function engines() {
        return Car::distinct()->get(['engine'])->pluck('engine')->toArray();
    }  

    /**
     * return the icon path for the filters
     * $instance string => transmission, road, seat, engine ...
     */
    public static function getIconPath($instance):string {
        return asset('images/cars/filters/'.$instance.'.svg');
    }

    /**
     * return the translation for the filters
     * $instance string => transmission, road, seat, engine ...
     */
    public static function getTranslation($instance):string {
        return __('cars.filters-'. $instance);        
    }
}
