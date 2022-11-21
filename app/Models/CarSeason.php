<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarSeason extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'car_season';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'car_id', 'season_id', 'prices'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'prices' => 'array',
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
     * Related season
     *
     * @return object
     */
    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
