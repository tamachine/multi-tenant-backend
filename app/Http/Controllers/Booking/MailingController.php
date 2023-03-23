<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class MailingController extends Controller
{
    public function index($tab = null): View
    {
        $this->authorize('booking');

        $data = [
            'crumbs' => [
                'Booking settings' => route('intranet.booking.dashboard')
            ],
            'tab' => emptyOrNull($tab) ? 'customer' : $tab,
        ];

        return view('booking.mailing.index')->with($data);
    }
}
