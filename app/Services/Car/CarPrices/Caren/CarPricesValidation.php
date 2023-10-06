<?php

namespace App\Services\Car\CarPrices\Caren;

use App\Models\Car;
use App\Services\Car\Caren\CarenValidation;

class CarPricesValidation extends CarenValidation {

   /**
     * CarPricesData constructor.
     *
     * @param Car $car
     * @param array $params
     */
    public function __construct(Car $car, array $params) {
        $this->car = $car;
        $this->params = $params;    
        $this->carParams = new CarPricesParams();
        
        $this->validate();
    }
}