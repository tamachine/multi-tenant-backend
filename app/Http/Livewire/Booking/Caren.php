<?php

namespace App\Http\Livewire\Booking;

use App\Apis\Caren\Api;
use App\Models\Booking;
use Illuminate\Support\Facades\Log;
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

    public function reloadCarenBooking(Api $api)
    {
        $bookingInfo = $api->bookingInfo([
            "RentalId" => $this->booking->vendor->caren_settings["rental_id"],
            "Guid" => $this->booking->caren_guid,
        ]);

        // When "Success" is set, there has been an error (irony)
        if (isset($bookingInfo["Success"])) {
            Log::error("Error reloading Caren booking. Booking ID: " . $this->booking->id . ". Error: " . $bookingInfo["Message"]);
            $this->dispatchBrowserEvent('open-error', ['message' => 'There was an error getting the information from Caren. If this error persists, please contact IT Support']);
            return;
        }

        $this->booking->update([
            'caren_info' => $bookingInfo
        ]);

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
