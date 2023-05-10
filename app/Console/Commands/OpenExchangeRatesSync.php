<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Apis\OpenExchangeRates\Api;
use Illuminate\Support\Facades\Log;

class OpenExchangeRatesSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rates:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dailya command to syncronize Rates table with open exchange api. (Rates is only used if api fails)';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Api $api)
    {
        Log::info("rates:sync -  START");

        $api->syncRates();

        Log::info("rates:sync -  END");

        return Command::SUCCESS;
    }
}
