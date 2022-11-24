<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarLocation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'car_location';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'car_id', 'location_id', 'open_from', 'open_to',
        'pickup_available', 'dropoff_available',
    ];

        /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'open_from' => 'datetime',
        'open_to' => 'datetime',
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
     * Related car
     *
     * @return object
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    /**
     * Related location
     *
     * @return object
     */
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
