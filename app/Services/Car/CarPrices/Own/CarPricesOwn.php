<?php

namespace App\Services\Car\CarPrices\Own;

use App\Models\Car;
use App\Models\Location;
use App\Services\Car\CarPrices\CarPricesInterface;
use App\Services\Car\CarPrices\CarPricesResult;
use DateTime;

/**
 * TODO
 */
class CarPricesOwn implements CarPricesInterface {

    protected Car $car;
    protected array $params;
    protected array $errors = [];

    protected DateTime $dateFrom;
    protected DateTime $dateTo;
    protected Location $pickupLocation;
    protected Location $dropoffLocation;

    public function validateData(): bool {
        return true;
    }

    public function errors(): array {
        return $this->errors;
    }

    public function setCar(Car $car) {
        $this->car = $car;
    }

    public function setParams(array $params) {
        $this->params = $params;
    }
      
    public function getPrices(): CarPricesResult {
        $carPricesResult = new CarPricesResult();

        return $carPricesResult;
    }
}
