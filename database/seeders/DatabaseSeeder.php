<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Landlord\Tenant;
use Database\Seeders\Landlord\LandlordSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * A list of tables to be ignored when truncating for re-seeding
     *
     * @var array
     */
    protected $ignoreTables = [
        'migrations',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(Tenant::checkCurrent()) {
            // Work out which seeding type should fire (environment specific)
            $method = 'run' . ucfirst(app()->environment());
            $this->{$method}();
        } else {
            $this->call([LandlordSeeder::class]);
        }
        
    }

    /**
     * Seeding processes to run in Production
     *
     * @return     void
     */
    private function runProduction()
    {
        //
    }

    /**
     * Seeding processes to run in Staging
     *
     * @return     void
     */
    private function runStaging()
    {
        // Only clean database when running seeders if not on production
        $this->cleanDatabase();
        $this->call([
            LanguageLineSeeder::class,
            FaqsSeeder::class,
            //FreeDaySeeder::class,
            RateSeeder::class,
            CarsIceland\UserSeeder::class,
            CarsIceland\AffiliateSeeder::class,
            CarsIceland\VendorLocationSeeder::class,
            CarsIceland\CarSeeder::class,
            CarsIceland\ExtraSeeder::class,
            InsurancesFeaturesSeeder::class,
            BlogSeeder::class,
        ]);
    }

    /**
     * Seeding processes to run in Local
     *
     * @return     void
     */
    private function runLocal()
    {
        // Only clean database when running seeders if not on production
        $this->cleanDatabase();
        $this->call([
            LanguageLineSeeder::class,
            FaqsSeeder::class,
            //FreeDaySeeder::class,
            RateSeeder::class,
            CarsIceland\UserSeeder::class,
            CarsIceland\AffiliateSeeder::class,
            CarsIceland\VendorLocationSeeder::class,
            CarsIceland\CarSeeder::class,
            CarsIceland\ExtraSeeder::class,
            InsurancesFeaturesSeeder::class,
            BlogSeeder::class,
        ]);
    }

    /**
     * Clean the database out each time you seed it
     *
     * @return     void
     */
    private function cleanDatabase()
    {
        Model::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $tables = recursivelyCollect(DB::select('SHOW TABLES'));

        // Remove any tables to be ignored and then truncate
        $tables->flatten()->reject(function ($table) {
            return in_array($table, $this->ignoreTables);
        })->each(function ($table) {
            DB::table($table)->truncate();
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
