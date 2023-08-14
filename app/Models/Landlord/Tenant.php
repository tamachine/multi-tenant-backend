<?php

namespace App\Models\Landlord;

class Tenant extends \Spatie\Multitenancy\Models\Tenant
{
    protected $append = ['url'];

    public function getUrlAttribute() {
        return 'https://' . $this->domain . '/login';
    }
}
