<?php

namespace App\Models\CarenObserver;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarenExtra extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'category', 'caren_id', 'caren_rental_id', 'caren_data'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'caren_data' => 'array',
    ];

    /**********************************
     * Relationships
     **********************************/

    /**
     * Define belongsToMany caren_car
     *
     * @return object
     */
    public function carenCars()
    {
        return $this->belongsToMany('App\Models\CArenObserver\CarenCar')->withTimestamps();
    }
}
