<?php

namespace App\Services\Car\CarPrices;

use App\Models\Car;
use App\Services\Car\CarPrices\Caren\CarPricesCaren;
use App\Services\Car\CarPrices\CarPricesInterface;
use App\Services\Car\CarTypeResolver;

/**
 * This class is responsible for resolving and returning the appropriate
 * CarBooking class based on the properties of the given Car object.
 */
class CarPricesResolver {

    
    protected int $carType; 

    /**
     * Determine and return the appropriate CarPrices class based on the given Car object.
     *
     * @param Car $car The car object used to determine the appropriate CarPrices class.
     * @return CarPricesInterface The resolved CarBooking class.
     */
    public function resolveCarPricesClass(Car $car): CarPricesInterface {

        $this->carType = app(CarTypeResolver::class)->resolveCarPricesClass($car);       

        return $this->determineClass();
    }

    /**
     * Based on the car object's properties, determine and return the appropriate CarPrices class.
     *
     * @return CarPricesInterface The determined CarBooking class.
     */
    protected function determineClass(): CarPricesInterface {
        
        switch ($this->carType) {

            case CarTypeResolver::CAREN:

                return app(CarPricesCaren::class);

            break;

            case CarTypeResolver::OWN:

                return app(CarPricesOwn::class);

            break;
            
        }        
    }
}
