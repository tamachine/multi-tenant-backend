<?php

namespace Database\Factories;

use App\Models\CarenCar;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarenCarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CarenCar::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'vendor_id' => Vendor::inRandomOrder()->first()->id,
        ];
    }
}
