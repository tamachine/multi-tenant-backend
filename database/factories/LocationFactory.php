<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'pickup_input_info' => $this->faker->text(35),
            'dropoff_input_info' => $this->faker->text(35),
            'order_appearance' => $this->faker->numberBetween(1, 15)
        ];
    }
}
