<?php

namespace App\Http\Controllers\Web;

use App\Models\Car;
use App\Models\InsuranceItem;

class InsurancesController extends BaseController
{
    public function index(Car $car) 
    {        
        return view(
            'web.insurances.index', ['car' => $car, 'insurances' => $car->insurances->take(3), 'insuranceItems' => InsuranceItem::all()]            
        );
    }

    protected function footerImagePath() : string 
    {
        return asset('images/footer/insurances.png');
    }

   
}

