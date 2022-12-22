<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\SelectableFull\TransmissionSelectableFullComponent;

class CarsController extends BaseController
{
    public function index() 
    {        
        return view(
            'web.cars.index', 
            [
                'breadcrumbs' => $this->getBreadcrumb(['home', 'cars']),
                'transmissionSelectableFull' => new TransmissionSelectableFullComponent(),
            ]
        );
    }

    protected function footerImagePath() : string 
    {
        return asset('images/footer/cars.png');
    }

   
}
