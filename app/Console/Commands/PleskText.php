<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class PleskText extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:plesk-test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test if the task scheduler is working in Plesk';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info("Plesk Test");
    }
}
