<?php

namespace App\Models\CarenObserver;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarenCar extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'caren_id', 'caren_rental_id', 'caren_data'
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
     * Define belongsToMany caren_extra
     *
     * @return object
     */
    public function carenExtras()
    {
        return $this->belongsToMany('App\Models\CarenObserver\CarenExtra')->withTimestamps();
    }
}
