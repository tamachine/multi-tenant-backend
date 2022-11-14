<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorLocationFee extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vendor_location_fees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vendor_id', 'location_pickup', 'location_dropoff', 'fee'
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
     * Related location (pickup)
     *
     * @return object
     */
    public function locationPickup()
    {
        return $this->belongsTo(Location::class, 'location_pickup');
    }

    /**
     * Related location (dropoff)
     *
     * @return object
     */
    public function locationDropoff()
    {
        return $this->belongsTo(Location::class, 'location_dropoff');
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
}
