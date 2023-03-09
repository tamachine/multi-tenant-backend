<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Affiliate;
use Illuminate\View\View;

class AffiliateController extends Controller
{
    public function index(): View
    {
        $this->authorize('booking');

        $data = [
            'action' => collect([
                'route' => route('intranet.booking.affiliate.create'),
                'title' => 'Create Affiliate'
            ]),
            'crumbs' => [
                'Booking settings' => route('intranet.booking.dashboard')
            ]
        ];

        return view('booking.affiliate.index')->with($data);
    }

    public function create(): View
    {
        $this->authorize('booking');

        $data = [
            'action' => collect([
                'route' => route('intranet.booking.affiliate.index'),
                'title' => 'Affiliates'
            ]),
            'crumbs' => [
                'Booking settings' => route('intranet.booking.dashboard'),
                'Affiliates' => route('intranet.booking.affiliate.index')
            ],
        ];

        return view('booking.affiliate.create')->with($data);
    }

    public function edit($hashid, $tab = null): View
    {
        $this->authorize('booking');

        $affiliate = Affiliate::where('hashid', $hashid)->firstOrFail();

        $data = [
            'affiliate' => $affiliate,
            'action' => collect([
                'route' => route('intranet.booking.affiliate.index'),
                'title' => 'Affiliates'
            ]),
            'crumbs' => [
                'Booking settings' => route('intranet.booking.dashboard'),
                'Affiliates' => route('intranet.booking.affiliate.index')
            ],
            'tab' => emptyOrNull($tab) ? 'basic' : $tab,
        ];

        return view('booking.affiliate.edit')->with($data);
    }
}
