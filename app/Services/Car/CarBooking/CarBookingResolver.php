<?php

namespace App\Services\Car\CarBooking;

use App\Models\Car;
use App\Services\Car\CarBooking\CarBookingInterface;
use App\Services\Car\CarBooking\Caren\CarBookingCaren;
use App\Services\Car\CarBooking\Caren\CarBookingOwn;
use App\Services\Car\CarTypeResolver;

/**
 * This class is responsible for resolving and returning the appropriate
 * CarBooking class based on the properties of the given Car object.
 */
class CarBookingResolver {

    
    protected int $carType; 

    /**
     * Determine and return the appropriate CarBooking class based on the given Car object.
     *
     * @param Car $car The car object used to determine the appropriate CarBooking class.
     * @return CarBookingInterface The resolved CarBooking class.
     */
    public function resolveCarBookingClass(Car $car): CarBookingInterface {

        $this->carType = app(CarTypeResolver::class)->resolveCarPricesClass($car);       

        return $this->determineClass();
    }

    /**
     * Based on the car object's properties, determine and return the appropriate CarBooking class.
     *
     * @return CarBookingInterface The determined CarBooking class.
     */
    protected function determineClass(): CarBookingInterface {
        
        switch ($this->carType) {

            case CarTypeResolver::CAREN:

                return app(CarBookingCaren::class);

            break;

            case CarTypeResolver::OWN:

                return app(CarBookingOwn::class);

            break;
            
        }        
    }
}
