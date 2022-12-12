<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Car;
use App\Models\Location;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $car = Car::inRandomOrder()->first();
        $vendor = Vendor::inRandomOrder()->first();
        $pickupLocation = Location::inRandomOrder()->first();
        $dropoffLocation = Location::inRandomOrder()->first();

        $hours = $this->faker->numberBetween(0, 23);
        $pickupDate = $this->faker->dateTimeBetween('-1 year', '+1 year');
        $pickupDate->setTime($hours, 0);
        $days = $this->faker->numberBetween(1, 15);
        $dropoffDate = clone $pickupDate;
        $dropoffDate->modify('+' . $days . ' days');
        $createdAtDate = clone $pickupDate;
        $createdAtDate->modify('-1 month');

        $rentalPayment = $this->faker->numberBetween(27000, 100000);
        $extrasPrice = $this->faker->numberBetween(0, 50000);

        return [
            'car_id' => $car->id,
            'vendor_id' => $vendor->id,
            'car_name' => $car->name,
            'vendor_name' => $vendor->name,
            'pickup_name' => $pickupLocation->name,
            'dropoff_name' => $dropoffLocation->name,
            'pickup_at' => $pickupDate,
            'dropoff_at' => $dropoffDate,
            'pickup_location' => $pickupLocation->id,
            'dropoff_location' => $dropoffLocation->id,

            'rental_price' => $rentalPayment,
            'exrtras_price' => $extrasPrice,
            'total_price' => $rentalPayment + $extrasPrice,
            'online_payment' => round(($rentalPayment + $extrasPrice) / 15),

            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' =>  $this->faker->unique()->safeEmail,
            'telephone' => $this->faker->phoneNumber,
            'number_passengers' => $this->faker->numberBetween(1, 5),
            'driver_name' => $this->faker->name,
            'driver_date_birth' => $this->faker->dateTimeBetween('-70 years', '-20 years')->format('d/m/Y'),
            'driver_id_passport' => 'XXXXXXXX',
            'driver_license_number' => 'YYYYYYYY',
            'country' => $this->faker->country,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'postal_code' => $this->faker->postcode,

            'created_at' => $this->faker->dateTimeBetween('-6 months', 'now')
        ];
    }
}
