<?php

namespace App\Models;

use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory, HashidTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'car_id', 'vendor_id', 'status', 'car_name', 'vendor_name',
        'pickup_name', 'dropoff_name', 'pickup_at', 'dropoff_at', 'pickup_location', 'dropoff_location',
        'rental_price', 'exrtras_price', 'total_price', 'online_payment',
        'booking_reference', 'order_number', 'amount_paid', 'currency_paid', 'payment_method',
        'payment_status', 'vendor_status', 'pickup_input_info', 'dropoff_input_info',
        'first_name', 'last_name', 'email', 'telephone', 'number_passengers',
        'driver_name', 'driver_date_birth', 'driver_id_passport', 'driver_license_number',
        'country', 'address', 'city', 'state', 'postal_code', 'weight_info',
        'extra_driver_info1', 'extra_driver_info2', 'extra_driver_info3', 'extra_driver_info4', 'newsletter',
        'affiliate_id', 'affiliate_commission', 'caren_info'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'caren_info'    => 'array',
        'pickup_at'     => 'datetime',
        'dropoff_at'    => 'datetime',
    ];

    /**********************************
     * Methods
     **********************************/

    //

    /**********************************
     * Accessors & Mutators
     **********************************/

    /**
     * Get the affiliate's edit URL
     *
     * @return     string
     */
    public function getEditUrlAttribute()
    {
        return route('affiliate.edit', $this->hashid);
    }

    /**
     * Get the last log
     *
     * @return     string
     */
    public function getLastLogAttribute()
    {
        $lastLog = $this->logs()->latest('id')->first();

        return $lastLog ? $lastLog->message : "-";
    }

    /**********************************
     * Scopes
     **********************************/

    //

    /**********************************
     * Relationships
     **********************************/

    /**
     * Related car
     *
     * @return object
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
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
     * Related pickup location
     *
     * @return object
     */
    public function pickupLocation()
    {
        return $this->belongsTo(Location::class, 'pickup_location');
    }

    /**
     * Related dropoff location
     *
     * @return object
     */
    public function dropoffLocation()
    {
        return $this->belongsTo(Location::class, 'dropoff_location');
    }

    /**
     * Related booking extras
     *
     * @return object
     */
    public function bookingExtra()
    {
        return $this->hasMany(BookingExtra::class);
    }

    /**
     * Related booking logs
     *
     * @return object
     */
    public function logs()
    {
        return $this->hasMany(BookingLog::class);
    }
}
