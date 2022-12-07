<?php

namespace App\Http\Livewire\Admin\Booking;

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
    public $order_number = "";

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
        //
    }

    public function render()
    {
        return view('livewire.admin.booking.search');
    }
}
