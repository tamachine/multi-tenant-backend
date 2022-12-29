<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use App\Models\Faq;

class HomeController extends BaseController
{
    public function index() 
    {               
        return view('web.home.index');
    }

    protected function footerImagePath() : string 
    {
        return asset('images/footer/home.png');
    }
}
