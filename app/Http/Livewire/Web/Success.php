<?php

namespace App\Http\Livewire\Web;

use App\Models\Booking;
use App\Models\Car;
use App\Traits\Livewire\SummaryTrait;
use Livewire\Component;

class Success extends Component
{
    use SummaryTrait;

    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\Booking
     */
    public $booking;

    /**
     * @var string
     */
    public $bookingPickupDate = "";

    /**
     * @var string
     */
    public $bookingDropoffDate = "";

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        $sessionData = request()->session()->get('booking_data');

        $this->car = Car::find(dehash($sessionData['car']));
        $this->booking = Booking::find(dehash($sessionData['booking']));

        if($this->car->mainImage()) {
            $this->mainImage = $this->car->mainImage()->assetPath();
        } elseif (count($this->car->images) > 0) {
            $this->mainImage = $this->car->images->first()->assetPath();
        } else {
            $this->mainImage = asset('images/cars/default-car.svg');
        }

        $this->bookingPickupDate = $sessionData['from']->isoFormat("MMMM D, Y");
        $this->bookingDropoffDate = $sessionData['to']->isoFormat("MMMM D, Y");
        $this->pickupLocation = bookingPickupLocation();
        $this->dropoffLocation = bookingDropoffLocation();
        $this->insurances = bookingInsurances();
        $this->includedExtras = $this->car->extraList()->where('included', 1);
        $this->chosenExtras = $sessionData["extras"];

        $this->percentage = $this->car->vendor->caren_settings["online_percentage"];
        $this->calculateTotal();

        // Remove the session
        request()->session()->forget('booking_data');
    }

    public function render()
    {
        return view('livewire.web.success');
    }
}
