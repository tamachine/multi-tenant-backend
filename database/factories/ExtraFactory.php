<?php

namespace Database\Factories;

use App\Models\Extra;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExtraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Extra::class;

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
