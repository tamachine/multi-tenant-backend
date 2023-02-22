<?php

namespace App\Http\Controllers\Web;

class CarsController extends BaseController
{
    public function index()
    {
        checkSessionCar();

        return view(
            'web.cars.index',
            [
                'breadcrumbs' => $this->getBreadcrumb(['home', 'cars']),
            ]
        );
    }

    protected function footerImagePath() : string
    {
        return 'images/footer/cars.png';
    }
}

