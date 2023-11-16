<?php

namespace Database\Seeders\MotorhomeIceland;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 6 locations
        for ($i = 1; $i <= 6; $i++) {
            Location::factory()->create();
        }
    }
}
