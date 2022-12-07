<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingLog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'booking_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'booking_id', 'user_id', 'message'
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
     * Related user
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
