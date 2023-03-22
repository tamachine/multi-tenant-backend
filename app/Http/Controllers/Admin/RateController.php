<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\View\View;

class RateController extends Controller
{
    public function index(): View
    {
        $this->authorize('admin');

        $data = [
            'action' => collect([
                'route' => route('intranet.rate.create'),
                'title' => 'Create Exchange Rate'
            ]),
            'crumbs' => [
                'Settings' => route('intranet.settings')
            ]
        ];

        return view('admin.rate.index')->with($data);
    }

    public function create(): View
    {
        $this->authorize('admin');

        $data = [
            'action' => collect([
                'route' => route('intranet.rate.index'),
                'title' => 'Exchange Rates'
            ]),
            'crumbs' => [
                'Settings' => route('intranet.settings'),
                'Exchange Rates' => route('intranet.rate.index')
            ],
        ];

        return view('admin.rate.create')->with($data);
    }

    public function edit($id): View
    {
        $this->authorize('admin');

        $rate = Rate::find($id);

        $data = [
            'rate' => $rate,
            'rateName' => $rate->name,
            'action' => collect([
                'route' => route('intranet.rate.index'),
                'title' => 'Exchange Rate'
            ]),
            'crumbs' => [
                'Settings' => route('intranet.settings'),
                'Exchange Rates' => route('intranet.rate.index')
            ],
        ];

        return view('admin.rate.edit')->with($data);
    }
}
