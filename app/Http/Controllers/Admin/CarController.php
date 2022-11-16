<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\View\View;

class CarController extends Controller
{
    public function index(): View
    {
        $data = [
            'action' => collect([
                'route' => route('car.create'),
                'title' => 'Create Car'
            ]),
        ];

        return view('admin.car.index')->with($data);
    }

    public function create(): View
    {
        $data = [
            'action' => collect([
                'route' => route('car.index'),
                'title' => 'Cars'
            ]),
        ];

        return view('admin.car.create')->with($data);
    }

    public function edit($hashid, $tab = null): View
    {
        $car = Car::where('hashid', $hashid)->firstOrFail();

        $data = [
            'car' => $hashid,
            'action' => collect([
                'route' => route('car.index'),
                'title' => 'Cars'
            ]),
            'tab' => emptyOrNull($tab) ? 'basic' : $tab,
        ];

        return view('admin.car.edit')->with($data);
    }
}
