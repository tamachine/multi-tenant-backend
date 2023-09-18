<?php

namespace App\Models;

use App\Helpers\Language;
use App\Traits\HasApiResponse;

class CarTransmission {

    public $id;
    public $text;    
    
    use HasApiResponse;

    protected $apiResponse = ['id', 'text'];
    
    public static function all($locale = null) {        
        $transmissions = Car::distinct()->get(['transmission'])->pluck('transmission')->toArray();

        foreach($transmissions as $transmission) {
            $carTransmission = new CarTransmission();
            $carTransmission->id = $transmission;    
            
            if(Language::isAvailableCode($locale)) {
                $text = __('cars.filters-transmission-'.$transmission, [], $locale);
            } else {
                foreach(Language::availableCodes() as $code) {
                    $text[$code] = __('cars.filters-transmission-'.$transmission, [], $code);
                }
            }

            $carTransmission->text = $text; 
                        
            $all[] = $carTransmission;
        }

        return collect($all);
    }    
}
