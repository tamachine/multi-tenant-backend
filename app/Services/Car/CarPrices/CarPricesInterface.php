<?php

namespace App\Services\Car\CarPrices;

use App\Models\Car;

interface CarPricesInterface {
    public function setCar(Car $car);
    public function setParams(array $params);
    public function validateData(): bool;
    public function getPrices(): CarPricesResult|false;
    public function errors(): array;
}