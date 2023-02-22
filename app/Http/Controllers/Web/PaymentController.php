<?php

namespace App\Http\Controllers\Web;

class PaymentController extends BaseController
{
    public function index()
    {
        if (!checkSessionPayment()) {
            return redirect()->route('cars');
        }

        return view(
            'web.payment.index'
        );
    }

    protected function footerImagePath(): string
    {
        return 'images/footer/payment.png';
    }
}
