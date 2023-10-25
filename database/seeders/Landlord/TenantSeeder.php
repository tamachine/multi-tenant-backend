<?php

namespace Database\Seeders\Landlord;

use Exception;
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
        $tenants = explode('|', config('multitenancy.tenants_from_env'));

        if(!$tenants[0]) {
            throw new Exception('ERROR: No tenants. You must set tenants in .env file');
        }

        foreach ($tenants as $tenant) {

            $fields = explode(',', $tenant);

            Tenant::create([
                'database' => $fields[0],
                'domain' => $fields[1],
                'name' => $fields[2],
                'long_name' => ucfirst($fields[2]),
            ]);

        }
    }
}
