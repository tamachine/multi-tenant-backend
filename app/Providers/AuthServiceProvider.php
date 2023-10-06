<?php

namespace App\Providers;

use App\Policies\AdminPolicy;
use App\Policies\AffiliatePolicy;
use App\Policies\BlogPolicy;
use App\Policies\BookingPolicy;
use App\Policies\ContentPolicy;
use App\Policies\DeveloperPolicy;
use App\Policies\ScandinavianPolicy;
use App\Policies\SuperAdminPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', [AdminPolicy::class, 'admin']);
        Gate::define('affiliate', [AffiliatePolicy::class, 'affiliate']);
        Gate::define('blog', [BlogPolicy::class, 'blog']);
        Gate::define('booking', [BookingPolicy::class, 'booking']);
        Gate::define('content', [ContentPolicy::class, 'content']);
        Gate::define('developer', [DeveloperPolicy::class, 'developer']);
        Gate::define('scandinavian', [ScandinavianPolicy::class, 'scandinavian']);
        Gate::define('superAdmin', [SuperAdminPolicy::class, 'superAdmin']);

        Gate::define('admin-or-content', function ($user) {
            return Gate::allows('admin', $user) || Gate::allows('content', $user);
        });

    }
}
