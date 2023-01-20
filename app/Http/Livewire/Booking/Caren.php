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

    public function createCarenBooking(Api $api)
    {
        $this->dispatchBrowserEvent('showOverlay');

        $carenBooking = $api->createBooking($this->booking->carenParameters);

        // When "Success" is set, there has been an error (irony)
        if (isset($carenBooking["Success"])) {
            Log::error("Error creating booking in Caren. Booking ID: " . $this->booking->id . ". Error: " . $carenBooking["Message"]);
            $this->dispatchBrowserEvent('open-error', ['message' => "Error creating booking in Caren. Error: " . $carenBooking["Message"]]);
            return;
        }

        // Booking created successfully. We get the "Guid" in the response
        $this->booking->update([
            'caren_guid' => $carenBooking["Guid"]
        ]);

        // Save a booking log
        $this->booking->logs()->create([
            'user_id'    => auth()->user()->id,
            'message'    => 'Booking created in Caren'
        ]);

        // Save the booking info from Caren
        $bookingInfo = $api->bookingInfo([
            "RentalId" => $this->booking->vendor->caren_settings["rental_id"],
            "Guid" => $carenBooking["Guid"],
        ]);

        if (!isset($bookingInfo["Success"])) {
            $this->booking->update([
                'caren_id'      => $bookingInfo["Id"],
                'caren_info'    => $bookingInfo
            ]);
        }

        session()->flash('status', 'success');
        session()->flash('message', 'Booking created in Caren');

        return redirect()->route('booking.edit', ["booking" => $this->booking->hashid, "tab" => "caren"]);
    }

    public function reloadCarenBooking(Api $api)
    {
        $this->dispatchBrowserEvent('showOverlay');

        // If the booking has already Caren info, update the booking info first
        if ($this->booking->caren_info) {
            $carenBooking = $api->editBooking(array_merge(["Guid" => $this->booking->caren_guid], $this->booking->carenParameters));

            // When there is an error editing, "Success" is equal to false
            if (isset($carenBooking["Success"]) && $carenBooking["Success"] == false) {
                Log::error("Error updating booking in Caren. Booking ID: " . $this->booking->id . ". Error: " . $carenBooking["Message"]);
                $this->dispatchBrowserEvent('open-error', ['message' => "Error updating booking in Caren. Error: " . $carenBooking["Message"]]);
                return;
            }
        }

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

    public function cancelCarenBooking(Api $api)
    {
        $this->dispatchBrowserEvent('showOverlay');

        $carenBooking = $api->cancelBooking([
            "RentalId" => $this->booking->vendor->caren_settings["rental_id"],
            "Guid" => $this->booking->caren_guid
        ]);

        // When there is an error cancelling, "Success" is equal to false
        if (isset($carenBooking["Success"]) && $carenBooking["Success"] == false) {
            Log::error("Error cancelling booking in Caren. Booking ID: " . $this->booking->id . ". Error: " . $carenBooking["Message"]);
            $this->dispatchBrowserEvent('open-error', ['message' => "Error cancelling booking in Caren. Error: " . $carenBooking["Message"]]);
            return;
        }

        // Reload the booking information from Caren
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

        // Save a booking log
        $this->booking->logs()->create([
            'user_id'    => auth()->user()->id,
            'message'    => 'Booking canceled in Caren'
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Booking canceled in Caren');

        return redirect()->route('booking.edit', ["booking" => $this->booking->hashid, "tab" => "caren"]);
    }

    public function render()
    {
        return view('livewire.booking.caren');
    }
}
