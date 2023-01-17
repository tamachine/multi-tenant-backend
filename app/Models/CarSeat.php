<?php

namespace App\Models;

use App\Helpers\Language;
use App;
use App\Traits\HasApiResponse;
use App\Models\Car;

class CarSeat {

    public $id;
    public $value;    
    
    use HasApiResponse;

    protected $apiResponse = ['id', 'value'];
    
    public static function all() {
        $seats = Car::distinct()->get(['adult_passengers'])->sortBy('adult_passengers')->pluck('adult_passengers')->toArray();

        foreach($seats as $seat) {
            $carSeat = new CarSeat();
            $carSeat->id = $seat;    
            $carSeat->value = $seat; 
                       
            $all[] = $carSeat;
        }

        return collect($all);
    }
}
