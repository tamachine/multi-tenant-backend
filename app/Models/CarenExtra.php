<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarenExtra extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'caren_id', 'extra_id', 'vendor_id',
        'caren_data'
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
     * Related extra
     *
     * @return object
     */
    public function extra()
    {
        return $this->belongsTo(Extra::class);
    }

    /**
     * Related vendor
     *
     * @return object
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    /**
     * Define belongsToMany caren_car
     *
     * @return object
     */
    public function carenCars()
    {
        return $this->belongsToMany('App\Models\CarenCar')->withTimestamps();
    }
}
