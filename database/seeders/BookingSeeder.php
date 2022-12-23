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
        // Seed 10-40 bookings for each car
        foreach (Car::all() as $car) {
            $carCode = $car->car_code;

            for ($i = 1; $i <= rand(10, 40); $i++) {
                $zeroes = strlen($i) > strlen($carCode) ? strlen($i) : strlen($carCode);

                switch (rand(1, 100)) {
                    case 99:
                        $paymentStatus = 'confirmed';
                        $vendorStatus = 'pending';
                        $status = 'pending';
                        break;

                    case 100:
                        $paymentStatus = 'pending';
                        $vendorStatus = 'pending';
                        $status = 'pending';
                        break;

                    default:
                        $paymentStatus = 'confirmed';
                        $vendorStatus = 'confirmed';
                        $status = 'confirmed';
                        break;
                }

                $params = [
                    'status' => $status,
                    'payment_status' => $paymentStatus,
                    'vendor_status' => $vendorStatus,
                    'car_id' => $car->id,
                    'car_name' => $car->name,
                    'order_number' => $carCode . str_pad($i, $zeroes, '0', STR_PAD_LEFT)
                ];

                $booking = Booking::factory($params)->create();

                // Add the default extras for that car
                foreach ($car->extras as $extra) {
                    $booking->bookingExtras()->create([
                        'extra_id'  => $extra->id,
                        'units'     => 1,
                    ]);
                }

                BookingLog::create([
                    'booking_id'    => $booking->id,
                    'message'       => 'Booking created'
                ]);

                if ($paymentStatus == 'confirmed') {
                    BookingLog::create([
                        'booking_id'    => $booking->id,
                        'message'       => 'Booking paid'
                    ]);
                }

                if ($vendorStatus == 'confirmed') {
                    BookingLog::create([
                        'booking_id'    => $booking->id,
                        'message'       => 'Booking confirmed by the vendor'
                    ]);
                }
            }
        }
    }
}
