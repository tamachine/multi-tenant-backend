<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 30 cars
        for ($i = 1; $i <= 30; $i++) {
            Car::factory()->create();
        }
    }
}
