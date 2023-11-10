<?php

namespace Database\Seeders;

use Database\Seeders\SeederResolver;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Landlord\Tenant;
use Database\Seeders\IcelandCars\Landlord\LandlordSeeder;

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

    protected $tenantSeeder;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(SeederResolver $seederResolver)
    {
        $this->tenantSeeder = $seederResolver->resolveDatabaseSeeder();

        if(Tenant::checkCurrent()) {
            
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
        $this->call($this->tenantSeeder->productionClasses());
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

        $this->call($this->tenantSeeder->stagingClasses());
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

        $this->call($this->tenantSeeder->localClasses());
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
