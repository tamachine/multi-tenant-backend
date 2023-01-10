<?php

namespace App\Models\CarenObserver;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarenLocation extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'caren_pickup_location_id', 'caren_dropoff_location_id',
        'open_from', 'open_to'
    ];
}
