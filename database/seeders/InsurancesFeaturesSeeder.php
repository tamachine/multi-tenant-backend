<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InsuranceFeature;

class InsurancesFeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 7 insurances features
        for ($i = 1; $i <= 7; $i++) {
            InsuranceFeature::factory()->create();
        }
    }
}