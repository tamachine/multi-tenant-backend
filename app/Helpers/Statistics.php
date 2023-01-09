<?php

namespace App\Helpers;

use App\Models\Booking;

class Statistics
{
    /**
     * Get the booking statistics
     *
     * @return array
     */
    public function bookingStatistics()
    {
        return [
            'lifetime' => Booking::whereIn('status', ['confirmed', 'concluded'])->count(),
            'last_30' => Booking::whereIn('status', ['confirmed', 'concluded'])->where('created_at', '>', now()->subDays(30))->count(),
            'last_7' => Booking::whereIn('status', ['confirmed', 'concluded'])->where('created_at', '>', now()->subDays(7))->count(),
        ];
    }
}
