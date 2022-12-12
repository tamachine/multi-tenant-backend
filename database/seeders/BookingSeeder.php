<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\BookingLog;
use App\Models\Car;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Booking::unsetEventDispatcher();

        // Create 100 bookings for each car
        foreach (Car::all() as $car) {
            $carCode = $car->car_code;

            for ($i = 1; $i <= 100; $i++) {
                $zeroes = strlen($i) > strlen($carCode) ? strlen($i) : strlen($carCode);
                $params = [
                    'status' => $i <= 99 || $car->id < 2 ? 'confirmed' : 'pending',
                    'payment_status' => $i <= 99 || $car->id < 3 ? 'confirmed' : 'pending',
                    'vendor_status' => $i <= 99 || $car->id < 2 ? 'confirmed' : 'pending',
                    'car_id' => $car->id,
                    'car_name' => $car->name,
                    'order_number' => $carCode . str_pad($i, $zeroes, '0', STR_PAD_LEFT)
                ];

                $booking = Booking::factory($params)->create();

                BookingLog::create([
                    'booking_id'    => $booking->id,
                    'message'       => 'Booking created'
                ]);

                if ($i <= 99 || $car->id < 3) {
                    BookingLog::create([
                        'booking_id'    => $booking->id,
                        'message'       => 'Booking paid'
                    ]);
                }

                if ($i <= 99 || $car->id < 2) {
                    BookingLog::create([
                        'booking_id'    => $booking->id,
                        'message'       => 'Booking confirmed by the vendor'
                    ]);
                }
            }
        }
    }
}
