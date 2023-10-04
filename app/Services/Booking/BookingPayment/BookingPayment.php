<?php

namespace App\Services\Booking\BookingPayment;

use App\Models\Booking;
use App\Services\Booking\BookingPayment\BookingPaymentResolver;

class BookingPayment {
    
    protected $bookingPaymentResolver;

    public function __construct(BookingPaymentResolver $bookingPaymentResolver) {                        
        $this->bookingPaymentResolver = $bookingPaymentResolver;            
    }  

    public function getData(Booking $booking) {
        $bookingPaymentClasses = $this->bookingPaymentResolver->resolveBookingPaymentClasses($booking);

        $data = [];

        foreach($bookingPaymentClasses as $bookingPaymentClass) {
            $data[] = [
                'type' => $bookingPaymentClass->getType(),
                'data' => $bookingPaymentClass->getData($booking)
            ];
        }

        return $data;
    }
}