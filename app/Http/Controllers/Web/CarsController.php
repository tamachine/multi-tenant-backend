<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\SelectableFull\TransmissionsSelectableFullComponent;
use App\Services\SelectableFull\RoadsSelectableFullComponent;
use App\Services\SelectableFull\SeatsSelectableFullComponent;
use App\Services\SelectableFull\EnginesSelectableFullComponent;

class CarsController extends BaseController
{
    public function index() 
    {        
        return view(
            'web.cars.index', 
            [
                'breadcrumbs' => $this->getBreadcrumb(['home', 'cars']),
                'transmissionsSelectableFull' => new TransmissionsSelectableFullComponent(),
                'roadsSelectableFull' => new RoadsSelectableFullComponent(),
                'seatsSelectableFull' => new SeatsSelectableFullComponent(),
                'enginesSelectableFull' => new EnginesSelectableFullComponent(),
            ]
        );
    }

    protected function footerImagePath() : string 
    {
        return asset('images/footer/cars.png');
    }

   
}

