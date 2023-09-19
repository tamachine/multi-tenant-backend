<?php

namespace App\Models;

use App\Helpers\Language;
use App\Traits\HasApiResponse;

class CarEngine {

    public $id;
    public $text;    
    
    use HasApiResponse;

    protected $apiResponse = ['id', 'text'];
    
    public static function all($locale = null) {                
        $engines = Car::distinct()->get(['engine'])->pluck('engine')->toArray();

        foreach($engines as $engine) {
            $carEngine = new CarEngine();
            $carEngine->id = $engine;    
            
            if(Language::isAvailableCode($locale)) {
                $text = __('cars.filters-engine-'.$engine, [], $locale);
            } else {
                foreach(Language::availableCodes() as $code) {
                    $text[$code] = __('cars.filters-engine-'.$engine, [], $code);
                }
            }

            $carEngine->text = $text; 
                        
            $all[] = $carEngine;
        }

        return collect($all);
    }    
}
