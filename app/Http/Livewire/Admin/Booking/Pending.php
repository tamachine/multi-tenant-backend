<?php

namespace App\Http\Livewire\Admin\Booking;

use App\Exports\PendingBookingsExport;
use App\Models\Booking;
use Excel;
use Livewire\Component;

class Pending extends Component
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

    public function excelExport()
    {
        return Excel::download(new PendingBookingsExport(), 'Pending bookings.xlsx');
    }

    public function render()
    {
        $bookings = Booking::whereStatus('pending')
            ->orderBy('id')
            ->get();

        return view('livewire.admin.booking.pending', ['bookings' => $bookings]);
    }
}
