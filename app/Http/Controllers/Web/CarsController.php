<?php

namespace App\Http\Controllers\Web;

class CarsController extends BaseController
{
    public function index()
    {
        checkSessionCar();

        $sessionData = request()->session()->get('booking_data');

        return view(
            'web.cars.index',
            [
                'breadcrumbs'   => getBreadcrumb(['home', 'cars']),
                'dates'         => ['from'   => $sessionData['from'],   'to'      => $sessionData['to']],
                'locations'     => ['pickup' => $sessionData['pickup'], 'dropoff' => $sessionData['dropoff']]
            ]
        );
    }

    protected function footerImagePath() : string
    {
        return '/images/footer/cars.png';
    }
}

