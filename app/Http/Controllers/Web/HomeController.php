<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class HomeController extends Controller
{
    public function index() 
    {
        return view('web.home.index');
    }
}
