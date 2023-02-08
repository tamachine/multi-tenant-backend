<?php

namespace App\Http\Controllers\Web;

use App\Models\Car;

class SummaryController extends BaseController
{
    public function index(Car $car) 
    {                
        return view(
            'web.extras.index', ['car' => $car, 'extras' => $car->extras]            
        );
    }

    protected function footerImagePath() : string 
    {
        return '';
    }

   
}

