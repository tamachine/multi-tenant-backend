<?php

namespace App\Http\Controllers\Web;

class FaqController extends BaseController
{
    public function index()
    {
        return view(
            'web.faq.index',
            [
                'breadcrumbs'   => $this->getBreadcrumb(['home', 'faq']),
            ]
        );
    }

    protected function footerImagePath() : string
    {
        return '/images/footer/faq.jpg';
    }
}

