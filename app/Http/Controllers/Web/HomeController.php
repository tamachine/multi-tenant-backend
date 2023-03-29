<?php

namespace App\Http\Controllers\Web;

class HomeController extends BaseController
{
    public function index()
    {
        return view('web.home.index');
    }

    protected function footerImagePath() : string
    {
        return '/images/footer/home.png';
    }
}
