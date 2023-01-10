<?php

namespace App\Console\Commands\Caren;

use Config;
use DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

/**
 * One time command to create the tables for the Caren observer
 */
class CarenMigrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'caren:migrations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'One time command to create the tables for the Caren observer';

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
        $sites = ['CI', 'CVI', 'RA', 'RC'];

        foreach($sites as $site) {
            Config::set('database.connections.mysql.database', env($site . '_DB_DATABASE'));
            Config::set('database.connections.mysql.username', env($site . '_DB_USERNAME'));
            Config::set('database.connections.mysql.password', env($site . '_DB_PASSWORD'));
            DB::purge('mysql');
            DB::reconnect('mysql');

            Artisan::call('migrate:refresh', [
                '--path' => 'database/migrations/caren',
            ]);
        }
    }
}
