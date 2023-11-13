<?php

namespace Database\Seeders;

use Database\Seeders\IcelandCars\DatabaseSeeder as IcelandCarsDatabaseSeeder;
use Database\Seeders\MotorhomeIceland\DatabaseSeeder as MotorhomeIcelandDatabaseSeeder;
use Spatie\Multitenancy\Models\Tenant;

class SeederResolver {

    public function resolveDatabaseSeeder() {

        switch(Tenant::current()->name) {            
            
            case 'mhi':

                return app(MotorhomeIcelandDatabaseSeeder::class);

                break;            
            
            case 'ic':            
            default:

                return app(IcelandCarsDatabaseSeeder::class);

                break;
        }

    }
}