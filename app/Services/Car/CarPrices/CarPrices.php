<?php

namespace App\Services\Car\CarPrices;

use App\Models\Car;

/**
 * This class retrieves the available car prices based on various filters such as dates, locations, 
 * and car specifications. It uses the CarPricesResolver to determine the appropriate pricing strategy 
 * or source for the given car and then fetches the prices accordingly.
 */
class CarPrices
{       
    /**
     * @var array
     */
    protected $errors;

    /**
     * @var CarPricesResolver The resolver used to determine the appropriate pricing strategy or source.
     */
    protected $carPricesResolver;

    /**
     * @var CarPricesInterface|null The resolved pricing class based on the car's properties.
     */
    protected $carPricesClass = null;
        
    /**
     * Constructor to initialize the CarPrices class.
     *
     * @param CarPricesResolver $carPricesResolver The resolver used to determine the appropriate pricing strategy or source.
     */
    public function __construct(CarPricesResolver $carPricesResolver) {                        
        $this->carPricesResolver = $carPricesResolver;            
    }        

    /**
     * Fetches the car prices based on the provided car and parameters.
     *
     * @param Car $car The car object for which the prices need to be fetched.
     * @param array $params The parameters (like dates, locations, specifications) based on which the prices are determined.
     * @return mixed Returns the car prices if data is valid, otherwise returns false.
     */
    public function getPrices(Car $car, array $params): CarPricesResult|false {

        // Resolve the appropriate CarPrices class based on the given car.
        $this->carPricesClass = $this->carPricesResolver->resolveCarPricesClass($car);
                
        $this->carPricesClass->setCar($car);
        $this->carPricesClass->setParams($params);
        
        if(!$this->carPricesClass->validateData()) {            
            return false;
        }
        
        return $this->carPricesClass->getPrices();
    }   

    /**
     * Retrieves any errors from the resolved CarPrices class.
     *
     * @return mixed Errors from the CarPrices class, if any.
     */
    public function errors() {
        return $this->carPricesClass->errors();
    }
}
