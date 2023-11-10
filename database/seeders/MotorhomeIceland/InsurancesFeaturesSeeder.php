<?php

namespace Database\Seeders\MotorhomeIceland;

use Illuminate\Database\Seeder;
use App\Models\Feature;
use App\Models\Insurance;

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
            Feature::factory()->create();
        }

        $count = 1;
        foreach(Insurance::orderBy('order_appearance')->get() as $insurance) {
            $featureIds = Feature::all()->take($count);

            $insurance->features()->attach($featureIds);
            
            $count = $count*2;
        }
    }
}