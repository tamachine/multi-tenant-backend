<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Booking;
use App\Services\Booking\BookingPayment\BookingPayment;

class BookingController extends BaseController
{
    
    protected $bookingPayment;

    public function __construct(BookingPayment $bookingPayment)
    {
        $this->bookingPayment = $bookingPayment;
    }

    public function payments(Booking $booking) {
        return $this->successResponse($this->bookingPayment->getData($booking));
    }
}
