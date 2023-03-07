<?php

namespace App\Http\Controllers\Web;

class AboutController extends BaseController
{
    public function index()
    {
        return view(
            'web.about.index',
            [
                'breadcrumbs'   => $this->getBreadcrumb(['home', 'about']),
                'titleClass'    => 'bg-about',
                'titleText'     => __('about.title')
            ]
        );
    }

    protected function footerImagePath() : string
    {
        return 'images/footer/about.jpg';
    }
}

