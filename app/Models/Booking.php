<?php

namespace App\Models;

use App\Traits\HashidTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class Booking extends Model
{
    use HasFactory, Notifiable, HashidTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'car_id', 'vendor_id', 'status', 'cancel_reason', 'car_name', 'vendor_name',
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

    /**
     * Delete any old versions of the PDF
     *
     * @return     void
     */
    public function deleteOldPdf()
    {
        if (Storage::disk('public')->exists('bookings/pdf/' . $this->hashid . '.pdf')) {
            Storage::disk('public')->delete('bookings/pdf/' . $this->hashid . '.pdf');
        }
    }

    /**********************************
     * Accessors & Mutators
     **********************************/

    /**
     * Get the booking's edit URL
     *
     * @return     string
     */
    public function getEditUrlAttribute()
    {
        return route('booking.edit', $this->hashid);
    }

    /**
     * Get the booking's PDF path
     *
     * @return     string
     */
    public function getPdfPathAttribute()
    {
        return Storage::disk('public')->exists('bookings/pdf/' . $this->hashid . '.pdf')
            ? asset('storage/bookings/pdf/' . $this->hashid . '.pdf')
            : '';
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

    /**
     * Get the affiliate name
     *
     * @return     string
     */
    public function getAffiliateNameAttribute()
    {
        return $this->affiliate ? $this->affiliate->name : "";
    }

    /**********************************
     * Scopes
     **********************************/

    /**
     * Scope to search the model for the history search
     *
     * @param      object  $query               Illuminate\Database\Query\Builder
     * @param      string  $booking_start_date  string
     * @param      string  $booking_end_date    string
     * @param      string  $pickup_start_date   string
     * @param      string  $pickup_end_date     string
     * @param      string  $dropoff_start_date  string
     * @param      string  $dropoff_end_date    string
     * @param      string  $payment_status      string
     * @param      string  $vendor_status       string
     * @param      string  $booking_status      string
     * @param      string  $vehicle             string
     * @param      string  $vendor              string
     * @param      string  $order_number        string
     * @param      string  $email               string
     * @param      string  $first_name          string
     * @param      string  $last_name           string
     * @param      string  $telephone           string
     *
     * @return     object  Illuminate\Database\Query\Builder
     */
    public function scopeHistorySearch(
        $query,
        $booking_start_date,
        $booking_end_date,
        $pickup_start_date,
        $pickup_end_date,
        $dropoff_start_date,
        $dropoff_end_date,
        $payment_status,
        $vendor_status,
        $booking_status,
        $vehicle,
        $vendor,
        $order_number,
        $email,
        $first_name,
        $last_name,
        $telephone
    ) {
        if (!empty($booking_start_date)) {
            $query->whereDate('created_at', '>=', Carbon::createFromFormat("d-m-Y", $booking_start_date));
        }

        if (!empty($booking_end_date)) {
            $query->whereDate('created_at', '<=', Carbon::createFromFormat("d-m-Y", $booking_end_date));
        }

        if (!empty($pickup_start_date)) {
            $query->whereDate('pickup_at', '>=', Carbon::createFromFormat("d-m-Y", $pickup_start_date));
        }

        if (!empty($pickup_end_date)) {
            $query->whereDate('pickup_at', '<=', Carbon::createFromFormat("d-m-Y", $pickup_end_date));
        }

        if (!empty($dropoff_start_date)) {
            $query->whereDate('dropoff_at', '>=', Carbon::createFromFormat("d-m-Y", $dropoff_start_date));
        }

        if (!empty($dropoff_end_date)) {
            $query->whereDate('dropoff_at', '<=', Carbon::createFromFormat("d-m-Y", $dropoff_end_date));
        }

        if (!empty($payment_status)) {
            $query->where('payment_status', $payment_status);
        }

        if (!empty($vendor_status)) {
            $query->where('vendor_status', $vendor_status);
        }

        if (!empty($booking_status)) {
            $query->where('status', $booking_status);
        }

        if (!empty($vehicle)) {
            $query->where('car_id', dehash($vehicle));
        }

        if (!empty($vendor)) {
            $query->where('vendor_id', dehash($vendor));
        }

        if (!empty($order_number)) {
            collect(str_getcsv($order_number, ' ', '"'))->filter()->each(function ($term) use ($query) {
                $term = '%' . $term . '%';
                $query->where('order_number', 'like', $term);
            });
        }

        if (!empty($email)) {
            collect(str_getcsv($email, ' ', '"'))->filter()->each(function ($term) use ($query) {
                $term = '%' . $term . '%';
                $query->where('email', 'like', $term);
            });
        }

        if (!empty($first_name)) {
            collect(str_getcsv($first_name, ' ', '"'))->filter()->each(function ($term) use ($query) {
                $term = '%' . $term . '%';
                $query->where('first_name', 'like', $term);
            });
        }

        if (!empty($last_name)) {
            collect(str_getcsv($last_name, ' ', '"'))->filter()->each(function ($term) use ($query) {
                $term = '%' . $term . '%';
                $query->where('last_name', 'like', $term);
            });
        }

        if (!empty($telephone)) {
            collect(str_getcsv($telephone, ' ', '"'))->filter()->each(function ($term) use ($query) {
                $term = '%' . $term . '%';
                $query->where('telephone', 'like', $term);
            });
        }


        return $query;
    }

    /**
     * Scope to search the model for the affiliate search
     *
     * @param      object  $query               Illuminate\Database\Query\Builder
     * @param      string  $year    int|null
     * @param      string  $status  string
     *
     * @return     object  Illuminate\Database\Query\Builder
     */
    public function scopeAffiliateSearch($query, $year, $status)
    {
        if (!empty($year)) {
            $query->whereYear('dropoff_at', $year);
        }

        if (!empty($status)) {
            if ($status == 'concluded') {
                $query->where('status', 'concluded');
            } else {
                $query->where('status', '!=', 'concluded');
            }
        }

        return $query;
    }

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
     * Related affiliate
     *
     * @return object
     */
    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
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
     * Related booking extras (pivot)
     *
     * @return object
     */
    public function bookingExtras()
    {
        return $this->hasMany(BookingExtra::class);
    }

    /**
     * Related extras
     *
     * @return object
     */
    public function extras()
    {
        return $this->belongsToMany(Extra::class, 'booking_extra');
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
