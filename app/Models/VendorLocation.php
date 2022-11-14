<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorLocation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vendor_id', 'location_id', 'price'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vendor_location';

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
     * Pivot table vendor_location
     *
     * @return object
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Pivot table vendor_location
     *
     * @return object
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
