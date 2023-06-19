<?php

namespace App\Http\Controllers\Web;

use Valitor;

class SuccessController extends BaseController
{
    public function index()
    {
        if (!checkSessionPayment()) {
            return redirect()->route('cars');
        }

        if(!Valitor::checkResponse()) {
            echo "error valitor";die;
        }

        return view(
            'web.success.index'
        );
    }

    protected function footerImagePath(): string
    {
        return '/images/footer/success.png';
    }
}
