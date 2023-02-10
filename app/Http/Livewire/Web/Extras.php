<?php

namespace App\Http\Livewire\Web;

use App\Apis\Caren\Api;
use App\Models\Car;
use App\Models\Extra;
use Livewire\Component;

class Extras extends Component
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
     * @var object
     */
    public $extras;

     /**
     * @var bool
     */
    public $showMoreButton;

     /**
     * @var object
     */
    public $extraPopup;

     /**
     * @var int
     */
    protected $take = 4;

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
    public $insurances;

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
    public $total = 0;

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

    public function mount(Car $car)
    {
        $this->car = $car;
        $this->extras = $this->car->extraList()->take($this->take);
        $this->setShowMoreButton();
        $this->extraPopup = $this->extras->first();

        if($this->car->mainImage()) {
            $this->mainImage = $this->car->mainImage()->assetPath();
        } elseif (count($this->car->images) > 0) {
            $this->mainImage = $this->car->images->first()->assetPath();
        } else {
            $this->mainImage = asset('images/cars/default-car.svg');
        }

        $this->pickupLocation = bookingPickupLocation();
        $this->dropoffLocation = bookingDropoffLocation();
        $this->insurances = bookingInsurances();
        $this->includedExtras = $this->car->extraList()->where('included', 1);

        $this->percentage = $this->car->vendor->caren_settings["online_percentage"];
        $this->calculateTotal();

    }

    public function render()
    {
        return view('livewire.web.extras');
    }

    public function toggleExtra($hashid)
    {
        if (isset($this->chosenExtras[$hashid])) {
            unset($this->chosenExtras[$hashid]);
        } else {
            $extra = Extra::find(dehash($hashid));
            $price = $extra->price_mode == 'per_day'
                ? $extra->price * bookingDays()
                : $extra->price;

            $this->chosenExtras[$extra->hashid] = [
                'name'      => $extra->name,
                'caren_id'  => $extra->caren_id,
                'price'     => $price,
                'quantity'  => 1,
            ];
        }

        $this->calculateTotal();
    }

    public function more()
    {
        $this->extras = $this->car->extraList();
        $this->setShowMoreButton();
    }

    public function info(Extra $extra)
    {
        $this->extraPopup = $extra;
    }

    protected function setShowMoreButton()
    {
        $this->showMoreButton = ($this->extras->count() < $this->car->extras->count());
    }

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

        $this->total = $carenPrices["TotalPrice"];
        $this->payNow = round($this->total * $this->percentage / 100);
    }
}
