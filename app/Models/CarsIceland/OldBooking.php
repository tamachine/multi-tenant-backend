<?php

namespace App\Models\CarsIceland;

use Illuminate\Database\Eloquent\Model;

class OldBooking extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'pickup_datetime'     => 'datetime',
        'dropoff_datetime'    => 'datetime',
        'booking_datetime'    => 'datetime',
    ];

    /**********************************
     * Methods
     **********************************/

    //
}
