<?php

namespace App\Services\Car\Caren;

use App\Models\Car;
use App\Models\Location;
use DateTime;

/**
 * Calidates parameters related to Caren car services.
 */
class CarenValidation {

    const DATE_FORMAT = 'Y-m-d H:i:s';
    
    /** @var Car */
    protected $car;

    /** @var array */
    protected $params;

    /** @var array */
    protected $errors = [];

    /** @var bool */
    protected $valid = false;

    /** @var object */
    protected $carParams;

    /**
     * CarPricesData constructor.
     *
     * @param Car $car
     * @param array $params
     */
    public function __construct(Car $car, array $params) {
        $this->car = $car;
        $this->params = $params;    
        $this->carParams = new CarenParams();
        
        $this->validate();
    }

     /**
     * Check if its valid.
     *
     * @return bool
     */
    public function isValid(): bool {
        return $this->valid;
    }

    /**
     * Get the errors array.
     *
     * @return array
     */
    public function getErrors(): array {
        return $this->errors;
    }

    /**
     * Get the getParams object.
     *
     * @return array
     */
    public function getParams(): object {
        return $this->carParams;
    }

    /**
     * Validate the data.
     *
     * @return bool
     */
    protected function validate() {
        $this->valid = (
            $this->validateCar() 
            && $this->validateDate('from') 
            && $this->validateDate('to')
            && $this->validateLocation('pickup')
            && $this->validateLocation('dropoff')
            && $this->validateExtras()
            && $this->validateInsurances()
        );
    }    

    /**
     * Validate the extras provided in the parameters.
     *
     * @return bool
     */
    protected function validateExtras():bool {
        if(isset($this->params['extras'])) {
            foreach(array_keys($this->params['extras']) as $hashid) {
                if(!$this->validateExtra($hashid)) return false;
            }

            $this->carParams->setExtras($this->params['extras']);
        }

        return true;
    }

    /**
     * Validate the insurances provided in the parameters.
     *
     * @return bool
     */
    protected function validateInsurances():bool {
        if(isset($this->params['insurances'])) {
            foreach($this->params['insurances'] as $hashid) {
                if(!$this->car->insurances->contains('hashid', $hashid)) {                                   
                    $this->errors[] = 'Insurance does not belong to car';
                    return false;
                }
            }            

            $this->carParams->setInsurances($this->params['insurances']);
        }       

        return true;
    }

    /**
     * Check if a specific extra belongs to the car.
     *
     * @param string $hashid
     * @return bool
     */
    protected function validateExtra($hashid): bool {
        $extras = $this->car->extraList(true);

        foreach ($extras as $extra) {
            if ($extra->hashid === $hashid) { 
                return true;
            }
        }
        $this->errors[] = 'Extra does not belong to car';
        return false;
    }

    /**
     * Validate if the car belongs to Caren.
     *
     * @return bool
     */
    protected function validateCar(): bool {
        if ($this->car->caren_id == null) {
            $this->errors[] = 'Car does not belong to caren';
            return false;
        }

        $this->carParams->car = $this->car;

        return true;
    }

     /**
     * Validate the date format of a specific date parameter.
     *
     * @param string $dateKey
     * @return bool
     */
    protected function validateDate(string $date): bool {

        if (!isset($this->params['dates'])) {
            $this->errors[] = "dates is not set";
            return false;
        }

        if (!isset($this->params['dates'][$date])) {
            $this->errors[] = "$date is not set";
            return false;
        }

        if (DateTime::createFromFormat(self::DATE_FORMAT, $this->params['dates'][$date]) === false) {
            $this->errors[] = "$date is not a valid date. format: ". self::DATE_FORMAT;
            return false;
        }

        $methodName = 'setDate'. ucfirst($date);

        $this->carParams->$methodName($this->params['dates'][$date]);        

        return true;
    }

   /**
     * Validate if a specific location parameter is a valid Caren location.
     *
     * @param string $locationKey
     * @return bool
     */
    protected function validateLocation(string $location): bool {

        if (!isset($this->params['locations'])) {
            $this->errors[] = "locations is not set";
            return false; 
        }

        if (!isset($this->params['locations'][$location])) {
            $this->errors[] = "$location is not set";
            return false; 
        }

        if (!Location::caren()->findByHashid($this->params['locations'][$location])->exists()) {
            $this->errors[] = "$location is not a valid caren location";
            return false;
        }

        $methodName = 'set'. ucfirst($location).'Location';

        $this->carParams->$methodName($this->params['locations'][$location]);

        return true;
    }
}