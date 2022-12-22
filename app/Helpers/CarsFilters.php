<?php

namespace App\Helpers;

use App\Services\PreferredLanguage\ApplyPreferredLanguageToLanguageSession;
use App\Models\Car;

class CarsFilters
{        
    public static function transmissions() {
        return Car::distinct()->get(['transmission'])->pluck('transmission')->toArray();
    }    
}
