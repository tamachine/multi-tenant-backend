<?php

namespace Database\Seeders\MotorhomeIceland;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Currency::create(['name' => 'Us Dollar', 'code' => 'USD','symbol' => '$']);
        Currency::create(['name' => 'Euro', 'code' => 'EUR','symbol' => '€']);
        Currency::create(['name' => 'British Pound', 'code' => 'GBP','symbol' => '£']);
        Currency::create(['name' => 'Iceland Krona', 'code' => 'ISK', 'symbol' => 'kr']);   
    }
}
