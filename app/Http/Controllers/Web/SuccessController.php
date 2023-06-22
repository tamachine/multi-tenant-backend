<?php

namespace App\Http\Controllers\Web;

use Valitor;
use App\Jobs\CreateBookingPdf;
use App\Models\Booking;

class SuccessController extends BaseController
{
    public function index()
    {
        
        if (!checkSessionPayment()) {
            return redirect()->route('cars');
        }

        if(!Valitor::checkResponse()) {
            return view('web.success.error');
        }

        $booking = $this->updateBooking();

        //create and send the pdf to the client
        dispatch(new CreateBookingPdf($booking, true));

        return view('web.success.index');
    }

    protected function updateBooking() {
        $bookingHashid = request()->session()->get('booking_data')['booking'];

        $booking = Booking::FindByHashid($bookingHashid);

        $booking->payment_status = 'confirmed';
        $booking->save();                

        return $booking;
    }

    protected function footerImagePath(): string
    {
        return '/images/footer/success.png';
    }
}
