<?php

namespace App\Models\Landlord;

class Tenant extends \Spatie\Multitenancy\Models\Tenant
{
    protected $append = ['url', 'login_url'];

    protected $fillable = ['name', 'long_name', 'domain', 'database'];

    public function getUrlAttribute() {
        return 'https://' . $this->domain;
    }

    public function getLoginUrlAttribute() {
        return $this->url . '/login';
    }
}
