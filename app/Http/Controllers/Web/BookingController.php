<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\View\View;

class BookingController extends Controller
{
    /**
     *  Booking pdf
     */
    public function pdf($hashid): View
    {
        $booking = Booking::where('hashid', $hashid)->firstOrFail();

        $data = [
            'booking' => $booking,
        ];

        return view('pdf.booking')->with($data);
    }
}
