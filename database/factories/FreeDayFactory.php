<?php

namespace Database\Factories;

use App\Models\FreeDay;
use Illuminate\Database\Eloquent\Factories\Factory;

class FreeDayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FreeDay::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $min_days = $this->faker->numberBetween(1, 50);

        return [
            'name' => $this->faker->company,
            'min_days' => $min_days ,
            'max_days' => $min_days + 7,
            'days_for_free' => $this->faker->numberBetween(1, 10),
        ];
    }
}
