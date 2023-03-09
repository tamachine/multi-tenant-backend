<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\View\View;

class BookingController extends Controller
{
    /**
     *  Booking Dashboard
     */
    public function dashboard(): View
    {
        $this->authorize('booking');

        return view('booking.dashboard');
    }

    /**
     *  Booking History
     */
    public function history(): View
    {
        $this->authorize('booking');

        $data = [
            'action' => collect([
                'route' => route('intranet.booking.create'),
                'title' => 'Create Booking'
            ])
        ];

        return view('booking.history')->with($data);
    }

    /**
     *  Booking create
     */
    public function create(): View
    {
        $this->authorize('booking');

        $data = [
            'action' => collect([
                'route' => route('intranet.booking.history'),
                'title' => 'Booking History'
            ]),
            'crumbs' => [
                'Booking History' => route('intranet.booking.history')
            ],
        ];

        return view('booking.create')->with($data);
    }

    /**
     *  Booking edit
     */
    public function edit($hashid, $tab = null): View
    {
        $this->authorize('booking');

        $booking = Booking::where('hashid', $hashid)->firstOrFail();

        $data = [
            'booking' => $booking,
            'action' => collect([
                'route' => route('intranet.booking.history'),
                'title' => 'Booking History'
            ]),
            'crumbs' => [
                'Booking History' => route('intranet.booking.history')
            ],
            'tab' => emptyOrNull($tab) ? 'basic' : $tab,
        ];

        return view('booking.edit')->with($data);
    }
}
