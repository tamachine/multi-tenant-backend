<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingExtra extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'booking_extra';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'booking_id', 'extra_id', 'units'
    ];

    /**********************************
     * Accessors & Mutators
     **********************************/

    //

    /**********************************
     * Scopes
     **********************************/

    //

    /**********************************
     * Relationships
     **********************************/

    /**
     * Related booking
     *
     * @return object
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    /**
     * Related extra
     *
     * @return object
     */
    public function extra()
    {
        return $this->belongsTo(Extra::class);
    }
}
