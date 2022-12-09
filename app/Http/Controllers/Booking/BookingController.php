<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
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
                'route' => route('booking.create'),
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
                'route' => route('booking.dashboard'),
                'title' => 'Bookings'
            ]),
            'crumbs' => [
                'Bookings' => route('booking.dashboard')
            ],
        ];

        return view('booking.create')->with($data);
    }
}
