<?php

namespace App\Models\CarsIceland;

use Illuminate\Database\Eloquent\Model;

class OldCarenBooking extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'datetime_from' => 'datetime',
        'datetime_to'   => 'datetime',
        'booking_date'  => 'datetime',
    ];

    /**********************************
     * Methods
     **********************************/

    //
}
