<?php

namespace App\Http\Livewire\Web;

use App\Models\Car;
use App\Models\Extra;
use App\Traits\Livewire\SummaryTrait;
use Livewire\Component;

class Extras extends Component
{
    use SummaryTrait;

    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var object
     */
    public $extras;

     /**
     * @var object
     */
    public $allExtras;

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

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Car $car)
    {
        $this->car = $car;
        $this->allExtras = $this->car->extraList();
        $this->extras = $this->allExtras->take($this->take);
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
        $this->showMoreButton = ($this->extras->count() < $this->allExtras->count());
    }

    public function continue()
    {
        $sessionData = request()->session()->get('booking_data');
        $sessionData['extras'] = $this->chosenExtras;
        request()->session()->put('booking_data', $sessionData);

        return redirect()->route('payment');
    }
}
