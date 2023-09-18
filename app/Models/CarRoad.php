<?php

namespace App\Models;

use App\Helpers\Language;
use App\Traits\HasApiResponse;

class CarRoad {

    public $id;
    public $text;    
    
    use HasApiResponse;

    protected $apiResponse = ['id', 'text'];
    
    public static function all($locale = null) {        
        $roads = Car::distinct()->get(['f_roads_name'])->pluck('f_roads_name')->toArray();
        
        foreach($roads as $road) {
            $carRoad = new CarTransmission();
            $carRoad->id = $road;    
            
            if(Language::isAvailableCode($locale)) {
                $text = __('cars.filters-road-'.$road, [], $locale);
            } else {
                foreach(Language::availableCodes() as $code) {
                    $text[$code] = __('cars.filters-road-'.$road, [], $code);
                }
            }            

            $carRoad->text = $text; 
                        
            $all[] = $carRoad;
        }

        return collect($all);
    }    
}
