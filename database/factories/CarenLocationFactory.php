<?php

namespace Database\Factories;

use App\Models\CarenLocation;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarenLocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CarenLocation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
        ];
    }
}
