<?php

namespace App\Http\Livewire\Booking;

use App\Models\Booking;
use App\Models\Vendor;
use Livewire\Component;

class Create extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $vendor;

    /**
     * @var array
     */
    public $vendors;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        $this->vendors = Vendor::pluck('name', 'hashid');
    }

    public function saveBooking(Booking $booking)
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'vendor' => ['required'],
        ];

        $this->validate($rules);

        // $booking = $booking->create([
        //     'vendor_id' => dehash($this->vendor),
        // ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Booking created. Please edit the booking data');

        //return redirect()->route('car.edit', $car->hashid);
    }

    public function render()
    {
        return view('livewire.booking.create');
    }
}
