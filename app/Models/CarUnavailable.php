<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarUnavailable extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'car_unavailable';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_date', 'end_date', 'car_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
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
        return $this->belongsTo(Vendor::class);
    }
}
