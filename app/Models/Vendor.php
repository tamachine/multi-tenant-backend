<?php

namespace App\Models;

use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendor extends Model
{
    use HasFactory, HashidTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'service_fee', 'vendor_code', 'status', 'brand_color', 'logo'
    ];

    /**********************************
     * Accessors & Mutators
     **********************************/

    /**
     * Get the vendor's logo URL
     *
     * @return     string
     */
    public function getLogoUrlAttribute()
    {
        return $this->logo
            ? asset('storage/vendors/' . $this->logo)
            : '';
    }

    /**********************************
     * Scopes
     **********************************/

    /**
     * Scope to search the model
     *
     * @param      object  $query    Illuminate\Database\Query\Builder
     * @param      object  $request  Illuminate\Http\Request
     *
     * @return     object  Illuminate\Database\Query\Builder
     */
    public function scopeLivewireSearch($query, $search)
    {
        if (!empty($search)) {
            //break down multiple words into sepearate string queries, using " " to group words
            //into a single query
            collect(str_getcsv($search, ' ', '"'))->filter()->each(function ($term) use ($query) {
                $term = '%' . $term . '%';
                $query->where('name', 'like', $term)
                    ->orWhere('vendor_code', 'like', $term);
            });
        }

        return $query;
    }

    /**********************************
     * Relationships
     **********************************/

    /**
     * Pivot table vendor_location
     *
     * @return object
     */
    public function vendorLocations()
    {
        return $this->hasMany(VendorLocation::class);
    }

    /**
     * Pivot table vendor_location_fees
     *
     * @return object
     */
    public function vendorLocationFees()
    {
        return $this->hasMany(VendorLocationFee::class);
    }
}
