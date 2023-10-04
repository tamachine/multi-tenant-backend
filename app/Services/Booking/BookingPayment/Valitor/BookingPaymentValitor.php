<?php

namespace App\Services\Booking\BookingPayment\Valitor;

use App\Models\Booking;
use App\Services\Booking\BookingPayment\BookingPaymentInterface;
use Valitor;

class BookingPaymentValitor implements BookingPaymentInterface {
    
    public function getData(Booking $booking): array {            
        return 
            [                
                'params'        => Valitor::getParams($booking),
                'form_action'   => Valitor::getFormAction()
            ];
    }

    public function getType(): string {
        return 'valitor';
    }
}