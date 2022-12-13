<?php

namespace App\Observers;

use App\Models\Booking;

class BookingObserver
{
    /**
     * Handle the Car "created" event.
     * Create and save the order_number
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function created(Booking $booking)
    {
        if ($booking->order_number) {
            return;
        }

        // 1. Get the car code
        $carCode = $booking->car->car_code;

        // 2. Get the last booking with that car_code
        $lastBooking = Booking::where('order_number', 'like', $carCode . '%')->orderBy('created_at', 'desc')->first();

        if ($lastBooking) {
            // Get the last order number for that car code and increment that number
            $nextNumber = intval(substr($lastBooking->order_number, strlen($carCode))) + 1;

            // Fill zeroes at the left
            $zeroes = strlen($nextNumber) > strlen($carCode) ? strlen($nextNumber) : strlen($carCode);
            $orderNumber = $carCode . str_pad($nextNumber, $zeroes, '0', STR_PAD_LEFT);
        } else {
            // No bookings with that car code, so we create the first order number
            $orderNumber = $carCode . "0001";
        }

        $booking->update([
            'order_number' => $orderNumber
        ]);
    }
}
