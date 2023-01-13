<?php

namespace App\Models;

use App\Helpers\Language;
use App;
use App\Traits\HasApiResponse;

class CarType {

    public $id;
    public $text;    
    public $imagePath;    

    use HasApiResponse;

    protected $apiResponse = ['id', 'text', 'imagePath'];
    
    public static function all($locale = null) {
        $types = config('car-specs.type');

        foreach($types as $type) {
            $carType = new CarType();
            $carType->id = $type;    
            
            if(Language::isAvailableCode($locale)) {
                $text = __('cars.filters-type-'.$type, [], $locale);
            } else {
                foreach(Language::availableCodes() as $code) {
                    $text[$code] = __('cars.filters-type-'.$type, [], $code);
                }
            }
            
            $carType->text = $text; 
                        
            $carType->imagePath = asset('images/cars/categories/'.$type.'.png');
            
            $all[] = $carType;
        }

        return collect($all);
    }

    public function getTextTranslated() {
        return $this->text[App::getLocale()];
    }
}
