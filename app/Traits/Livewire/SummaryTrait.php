<?php

namespace App\Traits\Livewire;

use App\Apis\Caren\Api;

trait SummaryTrait
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\Car
     */
    public $car;

    /**
     * @var string
     */
    public $mainImage;

    /**
     * @var string
     */
    public $pickupLocation;

    /**
     * @var string
     */
    public $dropoffLocation;

    /**
     * @var array
     */
    public $insurances = [];

    /**
     * @var array
     */
    public $chosenExtras = [];

    /**
     * @var array
     */
    public $includedExtras = [];

    /**
     * @var float
     */
    public $rentalPrice = 0;

    /**
     * @var float
     */
    public $extrasPrice = 0;

    /**
     * @var float
     */
    public $totalPrice = 0;

    /**
     * @var float
     */
    public $iskPrice = 0;

    /**
     * @var float
     */
    public $percentage = 0;

    /**
     * @var float
     */
    public $payNow = 0;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    protected function calculateTotal()
    {
        $sessionData = request()->session()->get('booking_data');
        $extras = [];

        if (count($this->chosenExtras)) {
            foreach ($this->chosenExtras as $chosenExtra) {
                $extras[] = [$chosenExtra['caren_id'], $chosenExtra['quantity']];
            }
        }

        $api = new Api();
        $params = [
            "RentalId"          => $this->car->vendor->caren_settings["rental_id"],
            "classId"           => $this->car->caren_id,
            "DateFrom"          => $sessionData["from"]->format('Y-m-d H:i:s'),
            "DateTo"            => $sessionData["to"]->format('Y-m-d H:i:s'),
            "pickupLocationId"  => $sessionData["pickup_caren_id"],
            "dropoffLocationId" => $sessionData["dropoff_caren_id"],
            "extras"            => count($this->chosenExtras) ? $extras : [],
            "insurances"        => count($sessionData["insurances"])
                ? [array_column($sessionData["insurances"], 'caren_id')]
                : [],
            "currency"          => "ISK"
        ];

        $carenPrices = $api->getPrices($params);

        $this->rentalPrice = $carenPrices["VehicleTotalPrice"];
        $this->extrasPrice = $carenPrices["ExtrasTotalPrice"] + $carenPrices["InsurancesTotalPrice"];
        $this->totalPrice = $this->iskPrice = $carenPrices["TotalPrice"];
        $this->payNow = round($this->totalPrice * $this->percentage / 100);
    }
}
