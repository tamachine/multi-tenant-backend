<?php

namespace Database\Seeders\IcelandCars;

use App\Models\FreeDay;
use Illuminate\Database\Seeder;

class FreeDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 6 free day plans
        FreeDay::factory(['name' => "8-15", 'min_days' => 8, 'max_days' => 15, 'days_for_free' => 1])->create();
        FreeDay::factory(['name' => "16-23", 'min_days' => 16, 'max_days' => 23, 'days_for_free' => 2])->create();
        FreeDay::factory(['name' => "24-31", 'min_days' => 24, 'max_days' => 31, 'days_for_free' => 3])->create();
        FreeDay::factory(['name' => "32-39", 'min_days' => 32, 'max_days' => 39, 'days_for_free' => 4])->create();
        FreeDay::factory(['name' => "40-47", 'min_days' => 40, 'max_days' => 47, 'days_for_free' => 5])->create();
        FreeDay::factory(['name' => "48-55", 'min_days' => 48, 'max_days' => 55, 'days_for_free' => 6])->create();
    }
}
