<?php

namespace App\Console\Commands\Caren;

use App\Jobs\Caren\CarenObserverJob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

/**
 * Daily command to get new information from Caren
 */
class CarenObserver extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'caren:observer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily command to review the information from Caren (Vendor, locations, cars & extras)';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info("CarenObserver - START");

        $sites = [
            'CI'    => 'Cars Iceland',
            'CVI'   => 'Campervan Iceland',
            'RA'    => 'Reykjavik Auto',
            'RC'    => 'Reykjavik Cars'
        ];

        foreach($sites as $code => $name) {
            dispatch(new CarenObserverJob($code, $name));
        }

        Log::info("CarenObserver - END");
    }
}
