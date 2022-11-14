<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorHoliday extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vendor_holidays';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'pickup_from', 'pickup_to', 'dropoff_from', 'dropoff_to', 'closed'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'date',
        'pickup_from' => 'datetime',
        'pickup_to' => 'datetime',
        'dropoff_from' => 'datetime',
        'dropoff_to' => 'datetime',
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
     * Related vendor
     *
     * @return object
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
