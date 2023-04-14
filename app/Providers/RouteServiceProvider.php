<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

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
        $this->bindings();
    }

     /**
     * Define the model bindings
     *
     * @return void
     */
    public function bindings() {
        Route::bind('translation_hashid', function ($value) {
            $resource = new \App\Models\Translation();
            return $resource->where('hashid', $value)->first();
        });

        Route::bind('translation_full_key', function ($value) {
            $resource = new \App\Models\Translation();

            $params = explode(".", $value, 2);

            if (count($params) == 2) {
                return $resource->where('group', $params[0])->where('key', $params[1])->first();
            }
        });

        Route::bind('faq_category_hashid', function ($value) {
            $resource = new \App\Models\FaqCategory();
            return $resource->where('hashid', $value)->first();
        });

        Route::bind('faq_hashid', function ($value) {
            $resource = new \App\Models\Faq();
            return $resource->where('hashid', $value)->first();
        });

        Route::bind('car_hashid', function ($value) {
            $resource = new \App\Models\Car();
            return $resource->where('hashid', $value)->first();
        });

        Route::bind('extra_hashid', function ($value) {
            $resource = new \App\Models\Extra();
            return $resource->where('hashid', $value)->first();
        });

        Route::bind('insurance_feature_hashid', function ($value) {
            $resource = new \App\Models\InsuranceFeature();
            return $resource->where('hashid', $value)->first();
        });

        Route::bind('newsletter_user_hashid', function ($value) {
            $resource = new \App\Models\NewsletterUser();
            return $resource->where('hashid', $value)->first();
        });

        Route::bind('blog_post_hashid', function ($value) {
            $resource = new \App\Models\BlogPost();
            return $resource->where('hashid', $value)->first();
        });

        Route::bind('blog_post_slug', function ($value) {
            $resource = \App\Models\BlogPost::where('slug', 'LIKE', '%' . $value . '%')->first();

            return $resource;
        });

        Route::bind('blog_category_slug', function ($value) {
            $resource = new \App\Models\BlogCategory();
            return $resource->where('slug', 'LIKE', '%' . $value . '%')->first();
        });

        Route::bind('blog_tag_slug', function ($value) {
            $resource = new \App\Models\BlogTag();
            return $resource->where('slug', $value)->first();
        });

        Route::bind('blog_author_slug', function ($value) {
            $resource = new \App\Models\BlogAuthor();
            return $resource->where('slug', $value)->first();
        });
    }
     /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function defineRoutes()
    {
        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::prefix('api')
                ->middleware(['api', 'auth:sanctum'])
                ->namespace($this->namespaceApi)
                ->group(base_path('routes/api.php'));

            $this->intranetRoutes();
        });
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
        );
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
