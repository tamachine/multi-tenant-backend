<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\View\View;

class LocationController extends Controller
{
    public function index(): View
    {
        $this->authorize('admin');

        $data = [
            'action' => collect([
                'route' => route('location.create'),
                'title' => 'Create Location'
            ]),
            'crumbs' => [
                'Settings' => route('settings')
            ]
        ];

        return view('admin.location.index')->with($data);
    }

    public function create($caren_location = null): View
    {
        $this->authorize('admin');

        $data = [
            'action' => collect([
                'route' => route('location.index'),
                'title' => 'Locations'
            ]),
            'crumbs' => [
                'Settings' => route('settings'),
                'Locations' => route('location.index')
            ],
            'caren_location' => $caren_location,
        ];

        return view('admin.location.create')->with($data);
    }

    public function edit($hashid, $tab = null): View
    {
        $this->authorize('admin');

        $location = Location::where('hashid', $hashid)->firstOrFail();

        $data = [
            'location' => $location,
            'locationName' => $location->name,
            'action' => collect([
                'route' => route('location.index'),
                'title' => 'Locations'
            ]),
            'crumbs' => [
                'Settings' => route('settings'),
                'Locations' => route('location.index')
            ],
            'tab' => emptyOrNull($tab) ? 'basic' : $tab,
        ];

        return view('admin.location.edit')->with($data);
    }
}
