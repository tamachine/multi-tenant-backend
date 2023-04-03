<?php

namespace App\Http\Controllers\Web;

class SuccessController extends BaseController
{
    public function index()
    {
        if (!checkSessionPayment()) {
            return redirect()->route('cars');
        }

        return view(
            'web.success.index'
        );
    }

    protected function footerImagePath(): string
    {
        return asset('/images/footer/success.png');
    }
}
