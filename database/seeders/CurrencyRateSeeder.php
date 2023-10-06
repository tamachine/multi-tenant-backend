<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Apis\OpenExchangeRates\Api;

class CurrencyRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Api $api)
    {
        $api->syncRates();
    }
}
