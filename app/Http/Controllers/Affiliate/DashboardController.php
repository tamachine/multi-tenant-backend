<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     *  Affiliate Dashboard
     */
    public function dashboard($tab = null): View
    {
        $this->authorize('affiliate');

        $data = [
            'affiliate' => auth()->user()->affiliate,
            'tab' => emptyOrNull($tab) ? 'basic' : $tab,
        ];

        return view('affiliate.dashboard')->with($data);
    }
}
