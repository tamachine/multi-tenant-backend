<?php

namespace App\Services\RoutesForPages;

use App\Models\Page;
use Illuminate\Support\Facades\Route;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Class to store and register routes that need SEO Configuration
 */
class RoutesForPages {

    protected $pages;

    public function __construct() {
        $this->storeRoutes();
        $this->setPages();           
    }   

    /**
     * Register the routes that are stored in Pages table
     */
    public function registerRoutes() {
        foreach($this->pages as $page) {
            Route::get($page->uri, [$page->controller, $page->method])->name($page->route_name);
        }
    }

    /**
     * Sets the pages to be stored and register
     */
    protected function setPages() {
        $this->pages = Page::all();
    }

    /**
     * Stores all the routes that need SEO Configuration
     * Routes that have instance dependency, don't have to be included in here
     */
    protected function storeRoutes() {

        /* Static pages */
        $this->storeRoute('home', '/', \App\Http\Controllers\Web\HomeController::class, 'Home page');
        $this->storeRoute('about', LaravelLocalization::transRoute('routes.about'), \App\Http\Controllers\Web\AboutController::class, 'About us page');           
        $this->storeRoute('contact', LaravelLocalization::transRoute('routes.contact'), \App\Http\Controllers\Web\ContactController::class, 'Contact page'); 
        $this->storeRoute('faq', LaravelLocalization::transRoute('routes.faq'), \App\Http\Controllers\Web\FaqController::class, 'FAQs page'); 
        $this->storeRoute('terms', LaravelLocalization::transRoute('routes.terms-and-conditions'), \App\Http\Controllers\Web\TermsAndConditionsController::class, 'Terms and conditions page'); 

        /* Blog */
        $this->storeRoute('blog', LaravelLocalization::transRoute('routes.blog'), \App\Http\Controllers\Web\BlogController::class, 'Blog list page'); 
        $this->storeRoute('blog.search.string', LaravelLocalization::transRoute('routes.blog/search'), \App\Http\Controllers\Web\BlogSearchStringController::class, 'Search results for blog when searching in the input'); 

        /* Booking process */        
        $this->storeRoute('cars', LaravelLocalization::transRoute('routes.cars'), \App\Http\Controllers\Web\CarsController::class, "Car's page");
        $this->storeRoute('payment', LaravelLocalization::transRoute('routes.payment'), \App\Http\Controllers\Web\PaymentController::class, "Personal details page (just before valitor payment)"); 
        $this->storeRoute('success', LaravelLocalization::transRoute('routes.success'), \App\Http\Controllers\Web\SuccessController::class, "Confirmation page (just after valitor payment)"); 

         /* Landings */
         Route::get(LaravelLocalization::transRoute('routes.cars/small-medium'), [LandingCarsController::class, 'small'])->name('cars.small');
         Route::get(LaravelLocalization::transRoute('routes.cars/large'), [LandingCarsController::class, 'large'])->name('cars.large');
         Route::get(LaravelLocalization::transRoute('routes.cars/premium'), [LandingCarsController::class, 'premium'])->name('cars.premium');

         $this->storeRoute('cars', LaravelLocalization::transRoute('routes.small-medium'), \App\Http\Controllers\Web\LandingCarsController::class, 'Landing for small-medium cars', 'small');
         $this->storeRoute('cars', LaravelLocalization::transRoute('routes.large'), \App\Http\Controllers\Web\LandingCarsController::class, 'Landing for large cars', 'large');
         $this->storeRoute('cars', LaravelLocalization::transRoute('routes.premium'), \App\Http\Controllers\Web\LandingCarsController::class, 'Landing for medium cars', 'medium');
        
    }

    /**
     * Stores a route in the database if it was not stored before
     * 
     * @param $route_name The name of the route
     * @param $uri The uri of the route
     * @param $controller The controller of the route
     * @param $descrption A description of the route
     * @param $method Method of the route
     */
    protected function storeRoute($route_name, $uri, $controller, $description, $method = 'index') {
        Page::firstOrCreate(
            [
                'route_name'  => $route_name,
                'uri'         => $uri,
            ], 
            [                 
                'controller'  => $controller, 
                'method'      => $method, 
                'description' => $description
            ]
        );
    }
}