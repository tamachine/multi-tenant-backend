<?php

namespace App\Models;

class CarType {

    public $text;
    public $imagePath;    
    public $id;

    public static function all() {
        $types = config('car-specs.type');

        foreach($types as $type) {
            $carType = new CarType();
            $carType->imagePath = asset('images/cars/categories/'.$type.'.png');
            $carType->text = __('cars.filters-type-'.$type);
            $carType->id = $type;

            $all[] = $carType;
        }

        return $all;
    }


}
