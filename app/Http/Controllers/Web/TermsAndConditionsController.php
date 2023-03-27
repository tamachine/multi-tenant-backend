<?php

namespace App\Http\Controllers\Web;

class TermsAndConditionsController extends BaseController
{
    public function index()
    {
        return view(
            'web.terms.index',
            [
                'breadcrumbs'   => $this->getBreadcrumb(['home', 'terms']),
            ]
        );
    }

    protected function footerImagePath() : string
    {
        return 'images/footer/terms.jpg';
    }
}


