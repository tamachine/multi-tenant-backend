<?php

namespace App\Http\Livewire\Booking;

use App\Models\Booking;
use Livewire\Component;

class Caren extends Component
{
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
     * @var array
     */
    public $caren_info;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Booking $booking)
    {
        $this->booking = $booking;
        $this->caren_info = $booking->caren_info;
    }

    public function createCarenBooking()
    {
        session()->flash('status', 'success');
        session()->flash('message', 'Booking sent to Caren');

        return redirect()->route('booking.edit', ["booking" => $this->booking->hashid, "tab" => "caren"]);
    }

    public function reloadCarenBooking()
    {
        session()->flash('status', 'success');
        session()->flash('message', 'Booking info reloaded');

        return redirect()->route('booking.edit', ["booking" => $this->booking->hashid, "tab" => "caren"]);
    }

    public function cancelCarenBooking()
    {
        session()->flash('status', 'success');
        session()->flash('message', 'Booking canceled in Caren');

        return redirect()->route('booking.edit', ["booking" => $this->booking->hashid, "tab" => "caren"]);
    }

    public function render()
    {
        return view('livewire.booking.caren');
    }
}
