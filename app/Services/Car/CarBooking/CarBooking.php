<?php

namespace App\Services\Car\CarBooking;

use App\Models\Booking;
use App\Models\Car;
use App\Services\Car\CarBooking\CarBookingResolver;

class CarBooking {

    /**
     * @var array
     */
    protected $errors;

    /**
     * @var CarBookingResolver 
     */
    protected $carBookingResolver;

    /**
     * @var CarBookingInterface|null 
     */
    protected $carBookingClass = null;
        
    /**     
     * @param carBookingResolver 
     */
    public function __construct(CarBookingResolver $carBookingResolver) {                        
        $this->carBookingResolver = $carBookingResolver;            
    }  

    public function create(Car $car, array $params): Booking|false {
        $this->carBookingClass = $this->carBookingResolver->resolveCarBookingClass($car);
                
        $this->carBookingClass->setCar($car);
        $this->carBookingClass->setParams($params);
        
        if(!$this->carBookingClass->validateData()) {            
            return false;
        }
        
        return $this->carBookingClass->create();
    }

    /**
     * Retrieves any errors from the resolved CarPrices class.
     *
     * @return mixed Errors from the CarPrices class, if any.
     */
    public function errors() {
        return $this->carBookingClass->errors();
    }
}