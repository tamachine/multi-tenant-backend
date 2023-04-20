<?php

namespace App\Exports;

use App\Models\Booking;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class NewsletterExport implements FromView
{
    /**
     * @var object
     */
    protected $bookings;

    public function __construct()
    {
        $this->bookings = Booking::where('newsletter', 1)
            ->select('email', 'first_name', 'last_name')
            ->orderBy('email', 'asc')
            ->get();
    }

    public function view(): View
    {
        return view('exports.booking.mailing', ['bookings' => $this->bookings]);
    }
}
