<?php

namespace App\Http\Controllers\Web;

use Valitor;
use App\Jobs\CreateBookingPdf;

class SuccessController extends BaseController
{
    public function index()
    {
        if (!checkSessionPayment()) {
            return redirect()->route('cars');
        }

        if(!Valitor::checkResponse()) {
            echo "error valitor";
            die;
        }
        
        //dispatch(new CreateBookingPdf($booking, true));

        return view(
            'web.success.index'
        );
    }

    protected function footerImagePath(): string
    {
        return '/images/footer/success.png';
    }
}
