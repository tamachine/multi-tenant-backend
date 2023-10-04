<?php

namespace App\Services\Car\CarPrices;

use App\Traits\HasApiResponse;

class CarPricesResult {

    use HasApiResponse;

    protected $apiResponse = ['carPrice','extrasPrice', 'insurancesPrice', 'total', 'payNow', 'extrasTotal', 'currency'];

    public $carPrice;
    public $extrasPrice;
    public $insurancesPrice;
    public $total;
    public $payNow;
    public $currency;
    
    public function extrasTotal() {
        return $this->extrasPrice + $this->insurancesPrice;
    }

    public function setPayNow($percentage) {
        $this->payNow = round($this->total * $percentage / 100);
    }
}