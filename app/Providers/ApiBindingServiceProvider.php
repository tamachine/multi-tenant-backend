<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Exceptions\Api\NotFoundException as ApiNotFoundException;

class ApiBindingServiceProvider extends ServiceProvider
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

        Route::bind('api_blog_post_slug', function ($value) {
            $resource = \App\Models\BlogPost::where('slug', 'LIKE', '%' . $value . '%')->first();
            return $this->processResponse($resource);            
        });

        Route::bind('api_page_name', function ($value) {
            $resource = \App\Models\Page::where('route_name', $value)->first();            
            return $this->processResponse($resource);  
        }); 

        Route::bind('api_faq_hashid', function ($value) {
            $resource = \App\Models\Faq::where('hashid', $value)->first();
            return $this->processResponse($resource); 
        });

        Route::bind('api_translation_full_key', function ($value) {
            $resource = new \App\Models\Translation();

            $params = explode(".", $value, 2);

            if (count($params) == 2) {
                $resource = $resource->where('group', $params[0])->where('key', $params[1])->first();
            }

            return $this->processResponse($resource); 
        });

    }

    protected function processResponse($resource) {
        if($resource) {
            return $resource;
        } else {           
            throw new ApiNotFoundException();                     
        }
    }
}
