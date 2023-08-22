<?php
namespace App\Tasks;

use Spatie\Multitenancy\Models\Tenant;

/**
 * This class manage config params when tenant is switched
 */
class SwitchTenantConfigTask implements \Spatie\Multitenancy\Tasks\SwitchTenantTask
{

    public function __construct(protected ?string $original_server_url = null)
    {
        $this->original_server_url ??= config('app.url');
    }

    public function makeCurrent(Tenant $tenant): void
    {        
        config([
            'request-docs.server_url' => $tenant->url,            
            'app.url' => $tenant->url,
        ]);
    }

    public function forgetCurrent(): void
    {
        config([
            'request-docs.server_url' => $this->original_server_url,   
            'app.url' =>  $this->original_server_url        
        ]);
    }
}