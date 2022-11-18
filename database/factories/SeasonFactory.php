<?php

namespace Database\Factories;

use App\Models\Season;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeasonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Season::class;

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
            'start_date' => $this->faker->dateTime(now()->addMonths(4)),
            'end_date' => $this->faker->dateTime(now()->addMonths(5)),
        ];
    }
}
