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
        Tenant::create([
            'name' => 'ra',
            'long_name' => 'Reykjavik Auto',
            'domain' => 'ra.suspicious-poincare.62-151-178-253.plesk.page',
            'database' => 'tenantra'
        ]);

        Tenant::create([
            'name' => 'ci',
            'long_name' => 'Cars Iceland',
            'domain' => 'ci.suspicious-poincare.62-151-178-253.plesk.page',
            'database' => 'tenantci'
        ]);
    }
}
