<?php

namespace App\Http\Livewire\Admin\Booking;

use App\Models\Booking;
use Carbon\Carbon;
use Livewire\Component;

class Dropoffs extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    //

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        //
    }

    public function render()
    {
        $dropoffs = Booking::whereStatus('confirmed')
            ->whereDate('dropoff_at', Carbon::today())
            ->orderBy('dropoff_at', 'asc')
            ->get();

        return view('livewire.admin.booking.dropoffs', ['dropoffs' => $dropoffs]);
    }
}
