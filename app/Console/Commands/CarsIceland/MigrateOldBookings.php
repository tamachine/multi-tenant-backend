<?php

namespace App\Console\Commands\CarsIceland;

use App\Models\Booking;
use App\Models\Car;
use App\Models\Extra;
use App\Models\CarsIceland\OldBooking;
use App\Models\CarsIceland\OldBookingExtra;
use App\Models\CarsIceland\OldCarenBooking;
use App\Models\CarsIceland\OldCarenBookingExtra;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

/**
 * Daily command to get new information from Caren
 */
class MigrateOldBookings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cars-iceland:migrate-old-bookings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate the old "booking" tables from Cars Iceland';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info("MigrateOldBookings - START");

        //$this->migrateBookings();
        $this->migrateCarenBookings();

        Log::info("MigrateOldBookings - END");
    }

    private function migrateBookings()
    {
        Log::info(OldBooking::count() . " records to migrate in the old 'booking' table");

        $oldBookings = OldBooking::all();

        foreach($oldBookings as $oldBooking) {
            // Pickup location
            $pickup_location = null;
            if (str_contains($oldBooking->p_location_name, "Airport")) {
                $pickup_location = 1;
            }
            if (str_contains($oldBooking->p_location_name, "Reykjavik")) {
                $pickup_location = 2;
            }

            // Dropoff location
            $dropoff_location = null;
            if (str_contains($oldBooking->d_location_name, "Airport")) {
                $dropoff_location = 1;
            }
            if (str_contains($oldBooking->d_location_name, "Reykjavik")) {
                $dropoff_location = 2;
            }

            // Status
            switch($oldBooking->status_total) {
                case 'activa':
                    $status = 'concluded';
                    break;

                case 'pending_dead':
                case 'cancel_client':
                    $status = 'canceled';
                    break;
            }

            $booking = Booking::create([
                'car_id' => $oldBooking->car_id - 35,
                'car_name' => $oldBooking->car_name,
                'vendor_id' => 1,
                'vendor_name' => 'BLUE CAR RENTAL',
                'pickup_location' => $pickup_location,
                'pickup_at' => $oldBooking->pickup_datetime,
                'pickup_name' => $oldBooking->p_location_name,
                'dropoff_location' => $dropoff_location,
                'dropoff_at' => $oldBooking->dropoff_datetime,
                'dropoff_name' => $oldBooking->d_location_name,
                'order_number' => $oldBooking->order_number,
                'total_price' => $oldBooking->total_price,
                'online_payment' => $oldBooking->online_payment,
                'payment_status' => $oldBooking->status_borgun,
                'vendor_status' => $oldBooking->status_vendor,
                'status' => $status,

                'first_name' => $oldBooking->first_name,
                'last_name' => $oldBooking->last_name,
                'email' => $oldBooking->email,
                'telephone' => $oldBooking->telephone,
                'address' => $oldBooking->address,
                'postal_code' => $oldBooking->postal_code,
                'city' => $oldBooking->city,
                'state' => $oldBooking->state,
                'country' => $oldBooking->country,

                'driver_name' => $oldBooking->driver_name,
                'driver_date_birth' => $oldBooking->driver_date_birth,
                'driver_id_passport' => $oldBooking->driver_id_passport,
                'driver_license_number' => $oldBooking->driver_license_number,
                'extra_driver_info1' => $oldBooking->extra_driver_info1,
                'extra_driver_info2' => $oldBooking->extra_driver_info2,
                'extra_driver_info3' => $oldBooking->extra_driver_info3,
                'extra_driver_info4' => $oldBooking->extra_driver_info4,
                'weight_info' => $oldBooking->weight_info,

                'number_passengers' => $oldBooking->number_passengers > 10 ? 1 : $oldBooking->number_passengers,
                'pickup_input_info' => $oldBooking->pickup_input_info,
                'dropoff_input_info' => $oldBooking->dropoff_input_info,
                'newsletter' => 0,

                'affiliate_id' => $oldBooking->affiliate_id ? $oldBooking->affiliate_id - 9 : null,
                'affiliate_commission' => $oldBooking->affiliate_commission ? $oldBooking->affiliate_commission : null,
                'created_at' => $oldBooking->booking_datetime
            ]);

            // Save a booking log
            $booking->logs()->create([
                'message'    => 'Booking migrated from previous app'
            ]);

            // If there was a comment in the booking, save another booking log
            if (!emptyOrNull($oldBooking->comments)) {
                $booking->logs()->create([
                    'message'    => 'Comments: ' . $oldBooking->comments
                ]);
            }

            // Get the old booking extras
            $oldExtras = OldBookingExtra::where('booking_reference', $oldBooking->booking_reference)->get();

            foreach($oldExtras as $oldExtra) {
                $booking->bookingExtras()->create([
                    'extra_id'  => $oldExtra->extra_id - 95,
                    'units'     => $oldExtra->units,
                ]);
            }
        }

    }

    private function migrateCarenBookings()
    {
        Log::info(OldCarenBooking::count() . " records to migrate in the old 'Caren booking' table");

        $oldBookings = OldCarenBooking::all();
        $extras = Extra::whereNotNull('caren_id')->pluck('id', 'caren_id');

        foreach($oldBookings as $oldBooking) {
            // Check that we have a Caren ID
            if (!$oldBooking->caren_id) {
                continue;
            }

            // Pickup location
            $pickup_location = 1;
            if (str_contains($oldBooking->pickupname, "Reykjavik")) {
                $pickup_location = 2;
            }

            // Dropoff location
            $dropoff_location = 1;
            if (str_contains($oldBooking->dropoffname, "Reykjavik")) {
                $dropoff_location = 2;
            }

            // Status & cancel reason
            $cancel_reason = null;

            switch($oldBooking->status_total) {
                case 'activa':
                    // Look if the dropoff date is in the past
                    if ($oldBooking->datetime_to < now()) {
                        $status = 'concluded';
                    } else {
                        $status = 'confirmed';
                    }
                    break;

                case 'cancel_client':
                    $status = 'canceled';
                    $cancel_reason = 'Canceled by client';
                    break;

                case 'cancel_vendor':
                    $status = 'canceled';
                    $cancel_reason = 'Canceled by vendor';
                    break;

                case 'cancel_no_refund':
                    $status = 'canceled';
                    $cancel_reason = 'Canceled - No refund';
                    break;

                case 'deposit_hold':
                    $status = 'canceled';
                    $cancel_reason = 'Canceled - Hold deposit';
                    break;

                case 'pending_dead':
                    $status = 'canceled';
                    $cancel_reason = 'Canceled - Pending dead';
                    break;
            }

            $car = Car::where('caren_id', $oldBooking->vehicle_id)->first();

            $booking = Booking::create([
                'car_id' => $car ? $car->id : null,
                'car_name' => $oldBooking->vehicle_name,
                'vendor_id' => 1,
                'vendor_name' => 'BLUE CAR RENTAL',
                'pickup_location' => $pickup_location,
                'pickup_at' => $oldBooking->datetime_from,
                'pickup_name' => $oldBooking->pickupname,
                'dropoff_location' => $dropoff_location,
                'dropoff_at' => $oldBooking->datetime_to,
                'dropoff_name' => $oldBooking->dropoffname,
                'order_number' => $oldBooking->caren_id,
                'caren_id' => $oldBooking->caren_id,
                'caren_guid' => $oldBooking->guid,
                'total_price' => $oldBooking->totalprice,
                'online_payment' => 0,
                'payment_status' => $oldBooking->status_borgun,
                'vendor_status' => $oldBooking->status_borgun,
                'status' => $status,
                'cancel_reason' => $cancel_reason,

                'first_name' => $oldBooking->firstname,
                'last_name' => $oldBooking->lastname,
                'email' => $oldBooking->email,
                'telephone' => $oldBooking->telephone,
                'address' => $oldBooking->address,
                'postal_code' => $oldBooking->zipcode,
                'city' => $oldBooking->city,
                'country' => $oldBooking->country,

                'driver_name' => $oldBooking->driver_name,
                'driver_date_birth' => $oldBooking->driver_date_of_birth,
                'driver_license_number' => $oldBooking->driver_license_number,

                'number_passengers' => $oldBooking->passangers > 10 ? 1 : $oldBooking->passangers,
                'pickup_input_info' => $oldBooking->flightnumber,
                'newsletter' => 0,

                'affiliate_id' => $oldBooking->affiliate_id >= 10 && $oldBooking->affiliate_id <= 13 ? $oldBooking->affiliate_id - 9 : null,
                'affiliate_commission' => $oldBooking->affiliate_commission ? $oldBooking->affiliate_commission : null,
                'created_at' => $oldBooking->booking_date
            ]);

            // Save a booking log
            $booking->logs()->create([
                'message'    => 'Booking migrated from previous app'
            ]);

            // If there was a comment in the booking, save another booking log
            if (!emptyOrNull($oldBooking->comments)) {
                $booking->logs()->create([
                    'message'    => 'Comments: ' . $oldBooking->comments
                ]);
            }

            // Get the old booking extras
            $oldExtras = OldCarenBookingExtra::where('guid', $oldBooking->guid)->get();

            foreach($oldExtras as $oldExtra) {
                $extraCarenId = substr($oldExtra->caren_id, 1);

                $booking->bookingExtras()->create([
                    'extra_id'      => $extras[$extraCarenId],
                    'units'         => $oldExtra->units,
                    'total_price'   => $oldExtra->total_price,
                ]);
            }
        }
    }
}
