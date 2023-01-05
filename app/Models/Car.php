<?php

namespace App\Models;

use App\Models\Location;
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
     * Get the car's edit URL
     *
     * @return     string
     */
    public function getEditUrlAttribute()
    {
        return route('car.edit', $this->hashid);
    }

    /**********************************
     * Methods
     **********************************/

    /**
     * Update some fields from Caren Settings
     *
     * @param   array   $carenSettings
     *
     * @return  void
     */
    public function updateFromCarenCar($carenSettings)
    {
        $carFields = [];

        if (isset($carenSettings["Id"])) {
            $carFields["caren_id"] = $carenSettings["Id"];
        }

        if (isset($carenSettings["Seats"])) {
            $carFields["adult_passengers"] = $carenSettings["Seats"];
        }

        if (isset($carenSettings["Doors"])) {
            $carFields["doors"] = $carenSettings["Doors"];
        }

        if (isset($carenSettings["Beds"])) {
            $carFields["beds"] = $carenSettings["Beds"];
        }

        if (isset($carenSettings["FuelName"])) {
            $fuelName = translate_caren_fuelname($carenSettings["FuelName"]);
            if ($fuelName != '') {
                $carFields["engine"] = $fuelName;
            }
        }

        if (isset($carenSettings["TransmissionName"])) {
            $transmissionName = translate_caren_transmission($carenSettings["TransmissionName"]);
            if ($transmissionName != '') {
                $carFields["transmission"] = $transmissionName;
            }
        }

        if (isset($carenSettings["DriveName"])) {
            $roadName = translate_caren_road($carenSettings["DriveName"]);
            if ($roadName != '') {
                $carFields["f_roads_name"] = $roadName;
            }
        }

        $this->update($carFields);
    }

    /**
     * Check if the car is allowed in F roads
     *
     * @return  bool
     */
    public function fRoadAllowed()
    {
        return $this->f_roads_name == 'fwd';
    }

    /**
     * Get the main image
     *
     * @return  object
     */
    public function mainImage()
    {
        return $this->images()->where('main', 1)->first();
    }

    /**********************************
     * Accessors & Mutators
     **********************************/

    /**
     * Get the vendor's logo URL
     *
     * @return     \Illuminate\Support\Collection
     */
    public function getAssignableLocationsAttribute()
    {
        $vendorLocationIds = ($this->vendor->vendorLocations->pluck('location_id'));

        return Location::whereIn('id', $vendorLocationIds)->orderBy('name')->get();
    }

    /**********************************
     * Scopes
     **********************************/

    /**
     * Scope to search the model
     *
     * @param      object  $query   Illuminate\Database\Query\Builder
     * @param      string  $status  Car Status
     * @param      string  $vendor  Vendor hashid
     * @param      string  $search  String to search
     *
     * @return     object  Illuminate\Database\Query\Builder
     */
    public function scopeLivewireSearch($query, $status, $vendor, $search)
    {
        if (!empty($status)) {
            $query->where('cars.active', intval($status));
        }

        if (!empty($vendor)) {
            $query->where('cars.vendor_id', dehash($vendor));
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

    /**
     * Related unavailable dates
     *
     * @return object
     */
    public function unavailableDates()
    {
        return $this->hasMany(CarUnavailable::class);
    }

    /**
     * Pivot table car_free_day
     *
     * @return object
     */
    public function carFreeDays()
    {
        return $this->hasMany(CarFreeDay::class);
    }

    /**
     * Pivot table car_location
     *
     * @return object
     */
    public function carLocations()
    {
        return $this->hasMany(CarLocation::class);
    }

    /**
     * Define belongsToMany extras
     *
     * @return object
     */
    public function extras()
    {
        return $this->belongsToMany('App\Models\Extra')->withTimestamps();
    }
}
