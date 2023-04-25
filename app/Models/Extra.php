<?php

namespace App\Models;

use App\Traits\HasFeaturedImage;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Extra extends Model
{
    use HasFactory, HashidTrait, SoftDeletes, HasTranslations, HasFeaturedImage;

    protected $featured_image_default_attribute = "image";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vendor_id', 'name', 'description', 'active', 'order_appearance',
        'price', 'maximum_fee', 'max_units', 'price_mode', 'category',
        'included', 'insurance_premium', 'image',
        'caren_id'
    ];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatable = ['name', 'description'];

    /**********************************
     * Accessors & Mutators
     **********************************/

     /**
     * Get the extra's edit URL
     *
     * @return     string
     */
    public function getEditUrlAttribute()
    {
        return route('intranet.extra.edit', $this->hashid);
    }    

    /**********************************
     * Scopes
     **********************************/

    /**
     * Scope to search the model
     *
     * @param      object  $query   Illuminate\Database\Query\Builder
     * @param      string  $vendor  Vendor hashid
     * @param      string  $search  String to search
     *
     * @return     object  Illuminate\Database\Query\Builder
     */
    public function scopeLivewireSearch($query, $vendor, $search)
    {
        if (!empty($vendor)) {
            $query->where('extras.vendor_id', dehash($vendor));
        }

        if (!empty($search)) {
            //break down multiple words into sepearate string queries, using " " to group words
            //into a single query
            collect(str_getcsv($search, ' ', '"'))->filter()->each(function ($term) use ($query) {
                $term = '%' . $term . '%';
                $query->where('extras.name', 'like', $term)
                    ->orWhere('vendors.name', 'like', $term);
            });
        }

        return $query;
    }

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

    /**
     * Define belongsToMany cars
     *
     * @return object
     */
    public function cars()
    {
        return $this->belongsToMany('App\Models\Car')->withTimestamps();
    }
}
