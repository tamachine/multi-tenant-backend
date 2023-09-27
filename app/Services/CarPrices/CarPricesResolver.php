<?php

namespace App\Services\CarPrices;

use App\Models\Car;
use App\Services\CarPrices\Caren\CarPricesCaren;
use App\Services\CarPrices\Own\CarPricesOwn;
use App\Services\CarPrices\CarPricesInterface;

/**
 * This class is responsible for resolving and returning the appropriate
 * CarPrices class based on the properties of the given Car object.
 */
class CarPricesResolver {

    /**
     * @var Car The car object used to determine the appropriate CarPrices class.
     */
    protected Car $car; 

    /**
     * Determine and return the appropriate CarPrices class based on the given Car object.
     *
     * @param Car $car The car object used to determine the appropriate CarPrices class.
     * @return CarPricesInterface The resolved CarPrices class.
     */
    public function resolveCarPricesClass(Car $car): CarPricesInterface {

        $this->car = $car; 

        return $this->determineClass();
    }

    /**
     * Based on the car object's properties, determine and return the appropriate CarPrices class.
     *
     * @return CarPricesInterface The determined CarPrices class.
     */
    protected function determineClass(): CarPricesInterface {
        
        if($this->car->caren_id !== null) {
            return new CarPricesCaren();
        }
        
        return new CarPricesOwn();
    }
}
