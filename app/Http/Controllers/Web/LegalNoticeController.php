<?php

namespace App\Http\Controllers\Web;

class LegalNoticeController extends BaseController
{
    public function index()
    {
        return view(
            'web.legal.index'           
        );
    }

    protected function footerImagePath() : string
    {
        return '/images/footer/terms.jpg';
    }
}


