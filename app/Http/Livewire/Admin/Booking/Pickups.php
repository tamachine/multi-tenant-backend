<?php

namespace App\Http\Livewire\Admin\Booking;

use App\Models\Booking;
use Carbon\Carbon;
use Livewire\Component;

class Pickups extends Component
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
        $pickups = Booking::whereStatus('confirmed')
            ->whereDate('pickup_at', Carbon::today())
            ->orderBy('pickup_at', 'asc')
            ->get();

        return view('livewire.admin.booking.pickups', ['pickups' => $pickups]);
    }
}
