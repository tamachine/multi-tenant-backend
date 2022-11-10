<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 6 vendors
        for ($i = 1; $i <= 6; $i++) {
            Vendor::factory()->create();
        }
    }
}
