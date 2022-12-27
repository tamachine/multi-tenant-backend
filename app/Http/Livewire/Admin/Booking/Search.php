<?php

namespace App\Http\Livewire\Admin\Booking;

use App\Models\Booking;
use Livewire\Component;

class Search extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $order_id = "";

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        //
    }

    public function searchBooking()
    {
        $booking = Booking::where('order_number', $this->order_id)->orWhere('caren_id', $this->order_id)->first();

        if ($booking) {
            return redirect()->route('booking.edit', $booking->hashid);
        } else {
            $this->dispatchBrowserEvent('open-error', ['message' => 'There is no booking with the Order ID "' . $this->order_id . '"']);
        }
    }

    public function render()
    {
        return view('livewire.admin.booking.search');
    }
}
