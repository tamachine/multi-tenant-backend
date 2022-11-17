<?php

namespace App\Models;

use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Car extends Model
{
    use HasFactory, HashidTrait, SoftDeletes, HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'active', 'vendor_id', 'name', 'car_code', 'description', 'year',
        'ranking', 'fleet_position', 'users_number_votes', 'min_preparation_time', 'min_days_booking',
        'adult_passengers', 'doors', 'luggage', 'units', 'online_percentage', 'discount_percentage', 'beds',
        'km_unlimited', 'bath_shower', 'kitchen', 'heater', 'cdw_insurance', 'driver_extra',
        'engine', 'transmission', 'vehicle_type', 'vehicle_brand', 'f_roads_name', 'vehicle_class',
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

    //

    /**********************************
     * Scopes
     **********************************/

    /**
     * Scope to search the model
     *
     * @param      object  $query   Illuminate\Database\Query\Builder
     * @param      string  $status  Car Status
     * @param      string  $search  String to search
     *
     * @return     object  Illuminate\Database\Query\Builder
     */
    public function scopeLivewireSearch($query, $status, $search)
    {
        if (!empty($status)) {
            $query->where('cars.active', intval($status));
        }

        if (!empty($search)) {
            //break down multiple words into sepearate string queries, using " " to group words
            //into a single query
            collect(str_getcsv($search, ' ', '"'))->filter()->each(function ($term) use ($query) {
                $term = '%' . $term . '%';
                $query->where('cars.name', 'like', $term)
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
     * Related images
     *
     * @return object
     */
    public function images()
    {
        return $this->hasMany(CarImage::class);
    }
}
