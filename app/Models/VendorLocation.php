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
     * Related location
     *
     * @return object
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
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