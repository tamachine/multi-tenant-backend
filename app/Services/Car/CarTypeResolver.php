<?php

namespace App\Services\Car;

use App\Models\Car;

/**
 * This class is responsible for resolving and returning the appropriate
 * Car type based on the properties of the given Car object.
 */
class CarTypeResolver {

    //Car types
    const CAREN = 1;
    const OWN   = 2;

    /**
     * @var Car The car object used to determine the appropriate Car type.
     */
    protected Car $car; 

    /**
     * Determine and return the appropriate Car type based on the given Car object.
     *
     * @param Car $car The car object used to determine the appropriate Car type.
     * @return int
     */
    public function resolveCarPricesClass(Car $car): int {

        $this->car = $car; 

        return $this->determineType();
    }

    /**
     * Based on the car object's properties, determine and return the appropriate Car type.
     *
     * @return int The determined Car type.
     */
    protected function determineType(): int {
        
        if($this->car->caren_id !== null) {
            return self::CAREN;
        }
        
        return self::OWN;
    }
}
