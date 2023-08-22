<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class BindingServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
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
            return $resource->where('hashid', $value)->firstOrFail();
        });

        Route::bind('translation_full_key', function ($value) {
            $resource = new \App\Models\Translation();

            $params = explode(".", $value, 2);

            if (count($params) == 2) {
                return $resource->where('group', $params[0])->where('key', $params[1])->firstOrFail();
            }
        });

        Route::bind('faq_category_hashid', function ($value) {
            $resource = new \App\Models\FaqCategory();
            return $resource->where('hashid', $value)->firstOrFail();
        });

        Route::bind('faq_hashid', function ($value) {
            $resource = new \App\Models\Faq();
            return $resource->where('hashid', $value)->firstOrFail();
        });

        Route::bind('car_hashid', function ($value) {
            $resource = new \App\Models\Car();
            return $resource->where('hashid', $value)->firstOrFail();
        });

        Route::bind('extra_hashid', function ($value) {
            $resource = new \App\Models\Extra();
            return $resource->where('hashid', $value)->firstOrFail();
        });

        Route::bind('insurance_feature_hashid', function ($value) {
            $resource = new \App\Models\InsuranceFeature();
            return $resource->where('hashid', $value)->firstOrFail();
        });

        Route::bind('newsletter_user_hashid', function ($value) {
            $resource = new \App\Models\NewsletterUser();
            return $resource->where('hashid', $value)->firstOrFail();
        });

        Route::bind('blog_post_hashid', function ($value) {
            $resource = new \App\Models\BlogPost();
            return $resource->where('hashid', $value)->firstOrFail();
        });

        Route::bind('page_hashid', function ($value) {
            $resource = new \App\Models\Page();
            return $resource->where('hashid', $value)->firstOrFail();
        });

        Route::bind('blog_post_slug', function ($value) {
            $resource = \App\Models\BlogPost::where('slug', 'LIKE', '%' . $value . '%')->firstOrFail();

            return $resource;
        });

        Route::bind('blog_category_slug', function ($value) {
            $resource = new \App\Models\BlogCategory();
            return $resource->where('slug', 'LIKE', '%' . $value . '%')->firstOrFail();
        });

        Route::bind('blog_tag_slug', function ($value) {
            $resource = new \App\Models\BlogTag();
            return $resource->where('slug', $value)->firstOrFail();
        });

        Route::bind('blog_author_slug', function ($value) {
            $resource = new \App\Models\BlogAuthor();
            return $resource->where('slug', $value)->firstOrFail();
        });   
            
    }
}
