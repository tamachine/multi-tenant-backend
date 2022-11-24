<?php

namespace Database\Seeders;

use App\Models\Extra;
use Illuminate\Database\Seeder;

class ExtraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 50 extras
        for ($i = 1; $i <= 50; $i++) {
            Extra::factory()->create();
        }
    }
}
