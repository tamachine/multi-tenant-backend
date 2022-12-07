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
            'lifetime' => Booking::where('status', 'confirmed')->count(),
            'last_30' => Booking::where('status', 'confirmed')->where('created_at', '>', now()->subDays(30))->count(),
            'last_7' => Booking::where('status', 'confirmed')->where('created_at', '>', now()->subDays(7))->count(),
        ];
    }
}
