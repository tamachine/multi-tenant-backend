<?php

namespace App\Http\Controllers\Web;

class PrivacyAndCookiePolicyController extends BaseController
{
    public function index()
    {
        return view(
            'web.privacy.index'           
        );
    }

    protected function footerImagePath() : string
    {
        return '/images/footer/terms.jpg';
    }
}


