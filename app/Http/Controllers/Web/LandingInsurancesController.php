<?php

namespace App\Http\Controllers\Web;

use App\Models\Insurance;

class LandingInsurancesController extends BaseController
{

   public function index()
   {
        return view('web.landing-insurances.index', ['insurances' => Insurance::all()]);
    }

   protected function footerImagePath() : string
    {
        return asset('/images/footer/landing-insurances.jpg');
    }
}


