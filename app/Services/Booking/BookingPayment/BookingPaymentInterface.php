<?php

namespace App\Services\Booking\BookingPayment;

use App\Models\Booking;

interface BookingPaymentInterface {   
    public function getData(Booking $booking): array;
    public function getType(): string;
}