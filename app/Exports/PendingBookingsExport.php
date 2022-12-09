<?php

namespace App\Exports;

use App\Models\Booking;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PendingBookingsExport implements FromView
{
    /**
     * @var object
     */
    protected $bookings;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bookings = Booking::whereStatus('pending')
            ->orderBy('id')
            ->get();
    }

    public function view(): View
    {
        return view('exports.booking.pending', ['bookings' => $this->bookings]);
    }
}
