<?php

namespace App\Http\Controllers\Web;

class CancellationPolicyController extends BaseController
{
    public function index()
    {
        return view(
            'web.cancellation.index'           
        );
    }

    protected function footerImagePath() : string
    {
        return '/images/footer/terms.jpg';
    }
}


