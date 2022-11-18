<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\View\View;

class LocationController extends Controller
{
    public function index(): View
    {
        $data = [
            'action' => collect([
                'route' => route('location.create'),
                'title' => 'Create Location'
            ]),
        ];

        return view('admin.location.index')->with($data);
    }

    public function create(): View
    {
        $data = [
            'action' => collect([
                'route' => route('location.index'),
                'title' => 'Locations'
            ]),
        ];

        return view('admin.location.create')->with($data);
    }

    public function edit($hashid): View
    {
        $location = Location::where('hashid', $hashid)->firstOrFail();

        $data = [
            'location' => $location,
            'locationName' => $location->name,
            'action' => collect([
                'route' => route('location.index'),
                'title' => 'Locations'
            ]),
        ];

        return view('admin.location.edit')->with($data);
    }
}
