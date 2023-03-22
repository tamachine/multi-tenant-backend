<?php

namespace Database\Seeders;

use App\Models\Rate;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create exchange rates
        Rate::factory(['code' => "EUR", 'name' => 'Euro', 'rate' => 0.934669])->create();
        Rate::factory(['code' => "GBP", 'name' => 'British Pound', 'rate' => 0.8226])->create();
        Rate::factory(['code' => "ISK", 'name' => 'Iceland Krona', 'rate' => 141.23])->create();
        Rate::factory(['code' => "USD", 'name' => 'US Dollar', 'rate' => 1])->create();
    }
}
