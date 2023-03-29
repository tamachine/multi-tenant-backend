<?php

namespace App\Http\Controllers\Web;

class ContactController extends BaseController
{
    public function index()
    {
        return view(
            'web.contact.index',
            [
                'breadcrumbs'   => $this->getBreadcrumb(['home', 'contact']),
            ]
        );
    }

    protected function footerImagePath() : string
    {
        return '/images/footer/contact.jpg';
    }
}

