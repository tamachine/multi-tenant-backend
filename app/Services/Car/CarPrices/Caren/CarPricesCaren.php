<?php

namespace App\Services\Car\CarPrices\Caren;

use App\Apis\Caren\Api;
use App\Models\Car;
use App\Services\Car\CarPrices\CarPricesInterface;
use App\Services\Car\CarPrices\CarPricesResult;

/**
 * This class implements the CarPricesInterface for fetching car prices from the Caren API.
 * It provides methods to validate data, set car details, set parameters, and retrieve prices.
 */
class CarPricesCaren implements CarPricesInterface {

    /**
     * @var Car The car object for which the prices need to be fetched.
     */
    protected Car $car;

    /**
     * @var array Parameters like dates, locations, extras, and insurances based on which the prices are determined.
     */
    protected array $params;

    /**
     * @var array List of errors, if any, during data validation.
     */
    protected array $errors = [];

    /**
     * @var CarPricesParams The params mapped as objects
     */
    protected CarPricesParams $carPricesParams;

    /**
     * Validates the car and parameters data.
     *
     * @return bool Returns true if data is valid, otherwise returns false.
     */
    public function validateData(): bool {
        $carPricesValidation = new CarPricesValidation($this->car, $this->params);

        $this->errors           = $carPricesValidation->getErrors();
        $this->carPricesParams  = $carPricesValidation->getParams();

        return $carPricesValidation->isValid();
    }

    /**
     * Retrieves any validation errors.
     *
     * @return array List of validation errors.
     */
    public function errors(): array {
        return $this->errors;
    }

    /**
     * Sets the car object.
     *
     * @param Car $car The car object.
     */
    public function setCar(Car $car) {
        $this->car = $car;
    }

    /**
     * Sets the parameters.
     *
     * @param array $params The parameters.
     */
    public function setParams(array $params) {
        $this->params = $params;
    }
      
    /**
     * Fetches the car prices from the Caren API based on the set car and parameters.
     *
     * @return array The car prices.
     */
    public function getPrices(): CarPricesResult|false {
        $api = new Api();

        $params = [
            "RentalId"          => $this->carPricesParams->car->vendor->caren_settings["rental_id"],
            "classId"           => $this->carPricesParams->car->caren_id,
            "DateFrom"          => $this->carPricesParams->dateFrom, 
            "DateTo"            => $this->carPricesParams->dateTo,
            "pickupLocationId"  => $this->carPricesParams->carenPickupLocationId,
            "dropoffLocationId" => $this->carPricesParams->carenDropoffLocationId,
            "extras"            => $this->carPricesParams->extras,
            "insurances"        => $this->carPricesParams->insurances,
            "currency"          => "ISK"
        ];        

        return $this->getCarPricesResult($api->getPrices($params));
    }

    protected function getCarPricesResult($carenPrices): CarPricesResult|false {
        
        if(isset($carenPrices['Success'])) {   
            $this->errors[] = $carenPrices['Message'];
            return false;
        }

        $carPricesResult = new CarPricesResult();
        
        $carPricesResult->carPrice        = $carenPrices['VehicleTotalPrice'];
        $carPricesResult->extrasPrice     = $carenPrices['ExtrasTotalPrice'];
        $carPricesResult->insurancesPrice = $carenPrices['InsurancesTotalPrice'];
        $carPricesResult->total           = $carenPrices['TotalPrice'];
        $carPricesResult->currency        = 'ISK';            
            
        $carPricesResult->setPayNow($this->carPricesParams->car->vendor->caren_settings["online_percentage"]);

        return $carPricesResult;     
    }
}
