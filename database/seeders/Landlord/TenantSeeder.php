<?php

namespace Database\Seeders\Landlord;

use Illuminate\Database\Seeder;
use App\Models\Landlord\Tenant;

class TenantSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tenant::create(['name' => 'ra', 'long_name' => 'Reykjavik Auto', 'domain' => 'nave.reykjavik-auto.test', 'database' => 'tenantra']);
        Tenant::create(['name' => 'ci', 'long_name' => 'Cars Iceland','domain' => 'nave.cars-iceland.test', 'database' => 'tenantci']);
    }
}