<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use App\Models\Landlord\Tenant;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    protected $namespace = 'App\\Http\\Controllers';
    protected $namespaceApi = 'App\\Http\\Controllers\\Api';
    protected $namespaceWeb = 'App\\Http\\Controllers\\Web';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();
        $this->defineRoutes();        
    }
    
     /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function defineRoutes()
    {
        $this->routes(function () {            
            $this->webRoutes();
            $this->apiRoutes();
            $this->intranetRoutes();
        });
    }

    protected function webRoutes() {     
        if(Tenant::checkCurrent()) {            
            Route::middleware('web')->group(base_path('routes/web.php')); 
        } else {
            Route::middleware('web')->group(base_path('routes/landlord.php')); 
        }                   
    }

    protected function apiRoutes() {
        Route::prefix('api')
        ->middleware(['api', 'auth:sanctum'])
        ->namespace($this->namespaceApi)
        ->group(base_path('routes/api.php'));
    }

    protected function intranetRoutes() {
        Route::group(
            [
                'prefix' => 'intranet',
                'as'     => 'intranet.',
            ],

            function () {
                Route::prefix('admin')
                    ->middleware(['web', 'auth'])
                    ->namespace($this->namespace)
                    ->group(base_path('routes/admin.php'));

                Route::prefix('affiliate')
                    ->middleware(['web', 'auth'])
                    ->namespace($this->namespace)
                    ->as('affiliate.')
                    ->group(base_path('routes/affiliate.php'));

                Route::prefix('booking')
                    ->middleware(['web', 'auth'])
                    ->namespace($this->namespace)
                    ->as('booking.')
                    ->group(base_path('routes/booking.php'));

                Route::prefix('content')
                    ->middleware(['web', 'auth'])
                    ->namespace($this->namespace)
                    ->as('content.')
                    ->group(base_path('routes/content.php'));

                Route::prefix('developer')
                    ->middleware(['web', 'auth'])
                    ->namespace($this->namespace)
                    ->as('developer.')
                    ->group(base_path('routes/developer.php'));

                Route::prefix('blog')
                    ->middleware(['web', 'auth'])
                    ->namespace($this->namespace)
                    ->as('blog.')
                    ->group(base_path('routes/blog.php'));
            }
        )->middleware(['tenant']);
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
    }
}
