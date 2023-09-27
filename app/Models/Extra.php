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

    protected $featured_image_attribute = "image";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vendor_id', 'name', 'description', 'active', 'order_appearance',
        'price', 'maximum_fee', 'max_units', 'price_mode', 'category',
        'included', 'insurance_premium', 'image',
        'caren_id', 'price_from'
    ];

    protected $append = ["is_insurance"];

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
      * Returns the extra price for a car
      * IMPORTANT! Use this method only if only one extra price must be returned
      * This method calls caren api for each instance so if a fast data loading is needed, it is better to use $this->getPriceFromCarenExtras
      * @return double
      */
     public function getPriceForCar(Car $car) {
        if($this->caren_id) {
            $carenExtras = $car->getCarenExtras(); //calls caren in every instance. use getPriceFromCarenExtras better if multiple calls to extra prices

            return $this->getPriceFromCarenExtras($carenExtras);
        } else {
            return $this->price;
        }
     }

     /**
      * Returns the extra price based on an already caren api call
      * This method is fastest than getPriceForCar as this one does not call caren api at all
      * @var array $carenExtras The result of a Api->extraList call
      * @return double|null
      */
     public function getPriceFromCarenExtras(array $carenExtras) {
        if(!empty($this->caren_id)) {

            if (isset($carenExtras['Extras'])) {
                $carenIdKeys = array_column($carenExtras['Extras'],'Id');
                $carenIdKey  = array_search($this->caren_id, $carenIdKeys);

                if ($carenIdKey !== false) {
                    return $carenExtras['Extras'][$carenIdKey]; // price found in caren
                }
            }

            return null; // if no price found in carenExtra, the price is null
        } else {
            return $this->price; // if the extra is not a caren extra, the current price must be returned
        }
     }

     /**
     * Get the extra's edit URL
     *
     * @return     string
     */
    public function getEditUrlAttribute()
    {
        return route('intranet.extra.edit', $this->hashid);
    }

    public function getIsInsuranceAttribute() {
        return $this->category == 'insurance';
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

    public function insurance()
    {
        return $this->hasOne(Insurance::class, 'id')->where('category', 'insurance');
    }

    public function carenExtra() {
        return $this->hasOne(CarenExtra::class, 'caren_id', 'caren_id');
    }
}
