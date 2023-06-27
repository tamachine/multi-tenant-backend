<?php

namespace App\Http\Controllers\Web;
use App\Models\Car;

class PaymentController extends BaseController
{
    public function index()
    {
        if (!checkSessionPayment()) {
            return redirect()->route('cars');
        }

        $sessionData = request()->session()->get('booking_data');

        $car = Car::find(dehash($sessionData['car']));

        return view(
            'web.payment.index', ['car' => $car]
        );
    }

    protected function footerImagePath(): string
    {
        return '/images/footer/payment.png';
    }
}
