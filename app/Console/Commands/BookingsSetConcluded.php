<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

/**
 * Daily command to get new information from Caren
 */
class BookingsSetConcluded extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bookings:set-concluded';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set confirmed bookings to concluded when the dropoff date has passed';

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
        Log::info("BookingsSetConcluded -  START");

        Booking::whereStatus('confirmed')
            ->whereDate('dropoff_at', '<', now())
            ->update([
                'status' => 'concluded'
            ]);

        Log::info("BookingsSetConcluded -  END");
    }
}
