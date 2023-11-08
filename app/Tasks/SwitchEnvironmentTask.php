<?php

namespace App\Tasks;

use Dotenv\Dotenv;
use Spatie\Multitenancy\Models\Tenant;
use Spatie\Multitenancy\Tasks\SwitchTenantTask;

class SwitchEnvironmentTask implements SwitchTenantTask
{
    public function makeCurrent(Tenant $tenant): void
    {
        $tenantEnvFileName = '.env.' . $tenant->name;

        $tenantEnvPath = app()->environmentPath() . '/' . $tenantEnvFileName;

        if (file_exists($tenantEnvPath)) {
            $dotenv = Dotenv::createMutable(app()->environmentPath(), $tenantEnvFileName);
            $dotenv->load();
        }
    }

    public function forgetCurrent(): void
    {
        // Logic to revert any changes if necessary
        // This might include clearing resolved instances, re-flushing config, etc.
    }
}
