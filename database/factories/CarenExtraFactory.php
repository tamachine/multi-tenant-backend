<?php

namespace Database\Factories;

use App\Models\CarenExtra;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarenExtraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CarenExtra::class;

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
