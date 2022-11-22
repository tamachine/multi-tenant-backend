<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarFreeDay extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'car_free_day';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'car_id', 'free_day_id',
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
     * Related free day
     *
     * @return object
     */
    public function freeDay()
    {
        return $this->belongsTo(FreeDay::class, 'free_day_id');
    }
}
