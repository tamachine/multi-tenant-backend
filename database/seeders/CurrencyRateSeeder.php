<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\CurrencyRate;
use Illuminate\Database\Seeder;

class CurrencyRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currenciesHashids = Currency::pluck('hashid');
        $rates = [0.934669,0.8226,141.23,1];

        foreach ($currenciesHashids as $key => $value) {
            CurrencyRate::create([
                'currency_id' =>  $value,
                'rate' =>  $rates[$key]
            ]);
        }

    }
}
