<?php

namespace App\Tasks;

use Spatie\Multitenancy\Models\Tenant;
use Spatie\Multitenancy\Tasks\SwitchTenantTask;
use Illuminate\Support\Facades\Artisan;

class SwitchEnvironmentTask implements SwitchTenantTask
{
    protected $originalEnvContent;

    public function makeCurrent(Tenant $tenant): void
    {
        $this->originalEnvContent = file_get_contents(app()->environmentFilePath());
        
        $tenantEnvPath = app()->environmentFilePath() . '.' . $tenant->name;

        if (file_exists($tenantEnvPath)) {
            
            $tenantEnvContent = file_get_contents($tenantEnvPath);

            $mergedEnvContent = $this->mergeEnvironmentVariables($this->originalEnvContent, $tenantEnvContent);

            file_put_contents(app()->environmentFilePath(), $mergedEnvContent);

            Artisan::call('config:clear');
        }
    }

    public function forgetCurrent(): void
    {
        // Restore the original .env content
        file_put_contents(app()->environmentFilePath(), $this->originalEnvContent);

        Artisan::call('config:clear');
    }

    protected function mergeEnvironmentVariables(string $originalContent, string $tenantContent): string
    {
        // Parse tenant .env content into an associative array
        $tenantEnv = [];
        $tenantLines = explode("\n", $tenantContent);
        foreach ($tenantLines as $line) {
            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                $tenantEnv[$key] = $value;
            }
        }

        // Iterate over the original content lines and replace or append tenant variables
        $envContent = '';
        $originalLines = explode("\n", $originalContent);
        foreach ($originalLines as $line) {
            // Check if the line contains an environment variable
            if (strpos($line, '=') !== false) {
                list($key, ) = explode('=', $line, 2);
                // If the tenant has a value for this key, replace it in the original content
                if (isset($tenantEnv[$key])) {
                    $envContent .= "{$key}={$tenantEnv[$key]}\n";
                    unset($tenantEnv[$key]); // Remove the key from tenant env to avoid duplication
                } else {
                    // If the tenant does not have a value for this key, keep the original line
                    $envContent .= $line . "\n";
                }
            } else {
                // Preserve comments and blank lines
                $envContent .= $line . "\n";
            }
        }

        // Append any remaining tenant-specific variables that were not in the original content
        foreach ($tenantEnv as $key => $value) {
            $envContent .= "{$key}={$value}\n";
        }

        return $envContent;
    }
}
