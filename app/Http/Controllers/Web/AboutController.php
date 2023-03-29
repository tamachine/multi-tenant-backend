<?php

namespace App\Http\Controllers\Web;

class AboutController extends BaseController
{
    public function index()
    {
        return view(
            'web.about.index',
        );
    }

    protected function footerImagePath() : string
    {
        return asset('/images/footer/about.jpg');
    }
}

