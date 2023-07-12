<?php

namespace Database\Seeders;

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

        foreach(Insurance::all() as $insurance) {
            $featureIds = Feature::inRandomOrder()->take(rand(0, Feature::all()->count()))->pluck('id');

            $insurance->features()->attach($featureIds);
        }
    }
}