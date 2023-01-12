<?php

namespace App\Models;

use App\Helpers\Language;
use App\Traits\HasApiResponse;

class CarRoad {

    public $id;
    public $text;    
    
    use HasApiResponse;

    protected $apiResponse = ['id', 'text'];
    
    public static function all() {
        $roads = config('car-specs.road');

        foreach($roads as $road) {
            $carRoad = new CarTransmission();
            $carRoad->id = $road;    
            
            foreach(Language::availableCodes() as $code) {
                $text[$code] = __('cars.filters-road-'.$road, [], $code);
            }

            $carRoad->text = $text; 
                        
            $all[] = $carRoad;
        }

        return collect($all);
    }    
}
