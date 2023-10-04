<?php

namespace App\Services\Booking\BookingPayment;

use App\Models\Booking;
use App\Services\Booking\BookingPayment\Valitor\BookingPaymentValitor;

class BookingPaymentResolver {
    
    protected Booking $booking; 

    /**
     * @return array of BookingPaymentInterface 
     */
    public function resolveBookingPaymentClasses(Booking $booking): array {      
        $this->booking = $booking;

        return $this->determineClasses();
    }
    
    /**
     * For now it returns always valitor but maybe another booking or tenant uses another kind/kinds of payment
     * @return array of BookingPaymentInterface
     */
    protected function determineClasses(): array {
        
        return [
            app(BookingPaymentValitor::class)
        ];
            
    }
}
