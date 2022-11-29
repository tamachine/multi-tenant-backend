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

    public function create($caren_car = null): View
    {
        $data = [
            'action' => collect([
                'route' => route('car.index'),
                'title' => 'Cars'
            ]),
            'caren_car' => $caren_car,
        ];

        return view('admin.car.create')->with($data);
    }

    public function edit($hashid, $tab = null): View
    {
        $car = Car::where('hashid', $hashid)->firstOrFail();

        $data = [
            'car' => $car,
            'carName' => $car->name . " (" . $car->vendor->name . ")",
            'action' => collect([
                'route' => route('car.index'),
                'title' => 'Cars'
            ]),
            'tab' => emptyOrNull($tab) ? 'basic' : $tab,
        ];

        return view('admin.car.edit')->with($data);
    }
}
