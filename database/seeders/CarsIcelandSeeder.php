<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\BookingLog;
use App\Models\CarenCar;
use App\Models\CarenLocation;
use App\Models\CarenVendor;
use App\Models\Car;
use App\Models\Location;
use App\Models\Vendor;
use App\Models\VendorLocation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class CarsIcelandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Vendor: Create Blue Car Rental
        $vendor = Vendor::create([
            'name' => 'Blue Car Rental',
            'vendor_code' => 'BLUE CAR RE',
            'service_fee' => 2000,
            'status' => 'active',
            'brand_color' => '#14c2fc',
            'caren_settings' => [
                'online_percentage' => 15,
                'caren_payment_option_id' => 598,
                'link_cms_caren' => false,
                'rental_id' => 11
            ]
        ]);

        CarenVendor::create([
            'name'              => 'Blue Car Rental',
            'caren_rental_id'   => 11,
            'vendor_id'         => $vendor->id,
        ]);

        // 2. Location: Create 2 locations
        $location = Location::create([
            'name' => 'Keflavik Airport',
            'caren_settings' => [
                'caren_pickup_location_id' => 44,
                'caren_dropoff_location_id' => 418,
            ]
        ]);

        CarenLocation::create([
            'name'                      => 'Keflavik International Airport',
            'caren_pickup_location_id'  => 44,
            'caren_dropoff_location_id' => 418,
            'location_id'               => $location->id
        ]);

        // Link the vendor to the location
        VendorLocation::create([
            'vendor_id' => $vendor->id,
            'location_id' => $location->id,
        ]);

        $location = Location::create([
            'name' => 'Reykjavik City Office',
            'caren_settings' => [
                'caren_pickup_location_id' => 51,
                'caren_dropoff_location_id' => 419,
            ]
        ]);

        CarenLocation::create([
            'name'                      => 'Reykjavik City Office',
            'caren_pickup_location_id'  => 44,
            'caren_dropoff_location_id' => 418,
            'location_id'               => $location->id
        ]);

        // Link the vendor to the location
        VendorLocation::create([
            'vendor_id' => $vendor->id,
            'location_id' => $location->id,
        ]);

        // 3. Get the cars & extras from the Artisan Command
        Artisan::call('caren:get-info');

        // 4. Link the Caren Cars to the Cars table
        foreach (CarenCar::all() as $carenCar) {
            $car = Car::create([
                'name' => $carenCar->name,
                'vendor_id' => $vendor->id,
                'car_code' => "CR" . (10 + $carenCar->id),
                'year' => 2020,
            ]);

            // Update some information from the Caren car and its extras
            $car->updateFromCarenCar($carenCar->caren_data);
            foreach($carenCar->carenExtras as $carenExtra) {
                $car->extras()->attach($carenExtra->id);
            }

            $carenCar->update([
                'car_id' => $car->id
            ]);
        }

        // 5. Seed 30 bookings for each car
        foreach (Car::all() as $car) {
            $carCode = $car->car_code;

            for ($i = 1; $i <= 30; $i++) {
                $zeroes = strlen($i) > strlen($carCode) ? strlen($i) : strlen($carCode);
                $params = [
                    'status' => $i <= 29 || $car->id < 31 ? 'confirmed' : 'pending',
                    'payment_status' => $i <= 29 || $car->id < 32 ? 'confirmed' : 'pending',
                    'vendor_status' => $i <= 29 || $car->id < 31 ? 'confirmed' : 'pending',
                    'car_id' => $car->id,
                    'car_name' => $car->name,
                    'order_number' => $carCode . str_pad($i, $zeroes, '0', STR_PAD_LEFT)
                ];

                $booking = Booking::factory($params)->create();

                BookingLog::create([
                    'booking_id'    => $booking->id,
                    'message'       => 'Booking created'
                ]);

                if ($i <= 29 || $car->id < 32) {
                    BookingLog::create([
                        'booking_id'    => $booking->id,
                        'message'       => 'Booking paid'
                    ]);
                }

                if ($i <= 29 || $car->id < 31) {
                    BookingLog::create([
                        'booking_id'    => $booking->id,
                        'message'       => 'Booking confirmed by the vendor'
                    ]);
                }
            }
        }
    }
}
