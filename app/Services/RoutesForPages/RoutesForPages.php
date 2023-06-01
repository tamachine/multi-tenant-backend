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
            /* URLs are defined in UrlsSeeder class because they are stored in database - LaravelLocalization::transRoute */
            Route::get(LaravelLocalization::transRoute($page->uri_fullkey), [$page->controller, $page->method])->name($page->route_name);
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
     * Routes that have instance dependency, don't have to be included in here as their SEO configurations will be managed throught they correponding CRUD
     */
    protected function storeRoutes() {

        /* Static pages */
        $this->storeRoute('home', '/', \App\Http\Controllers\Web\HomeController::class, 'Home page');
        $this->storeRoute('about', 'routes.about', \App\Http\Controllers\Web\AboutController::class, 'About us page');           
        $this->storeRoute('contact', 'routes.contact', \App\Http\Controllers\Web\ContactController::class, 'Contact page'); 
        $this->storeRoute('faq', 'routes.faq', \App\Http\Controllers\Web\FaqController::class, 'FAQs page'); 
        $this->storeRoute('terms', 'routes.terms-and-conditions', \App\Http\Controllers\Web\TermsAndConditionsController::class, 'Terms and conditions page'); 

        /* Blog */
        $this->storeRoute('blog', 'routes.blog', \App\Http\Controllers\Web\BlogController::class, 'Blog list page'); 
        $this->storeRoute('blog.search.string', 'routes.blog/search', \App\Http\Controllers\Web\BlogSearchStringController::class, 'Search results for blog when searching in the input'); 

        /* Booking process */        
        $this->storeRoute('cars', 'routes.cars', \App\Http\Controllers\Web\CarsController::class, "Car's page");
        $this->storeRoute('payment', 'routes.payment', \App\Http\Controllers\Web\PaymentController::class, "Personal details page (just before valitor payment)"); 
        $this->storeRoute('success', 'routes.success', \App\Http\Controllers\Web\SuccessController::class, "Confirmation page (just after valitor payment)"); 

        $this->storeRoute('insurances', 'routes.{car_hashid}/insurances', \App\Http\Controllers\Web\InsurancesController::class, 'Insurances page for booking process', 'index', \App\Models\Car::class);
        $this->storeRoute('extras', 'routes.{car_hashid}/extras', \App\Http\Controllers\Web\ExtrasController::class, 'Extras page for booking process', 'index', \App\Models\Car::class);
        //$this->storeRoute('insurances', 'routes.{car_hashid}/summary', \App\Http\Controllers\Web\SummaryController::class, 'Summary page for booking process');        

        /* Landings */         
        $this->storeRoute('cars.small', 'routes.cars/small-medium', \App\Http\Controllers\Web\LandingCarsController::class, 'Landing for small-medium cars', 'small');
        $this->storeRoute('cars.large', 'routes.cars/large', \App\Http\Controllers\Web\LandingCarsController::class, 'Landing for large cars', 'large');
        $this->storeRoute('cars.premium', 'routes.cars/premium', \App\Http\Controllers\Web\LandingCarsController::class, 'Landing for medium cars', 'premium');

        /* Blog */        
        $this->storeRoute('blog.search.category', 'routes.blog/category/{blog_category_slug}', \App\Http\Controllers\Web\BlogSearchCategoryController::class, 'Category search results page', 'index', \App\Models\BlogCategory::class);
        $this->storeRoute('blog.search.tag', 'routes.blog/tag/{blog_tag_slug}', \App\Http\Controllers\Web\BlogSearchTagController::class, 'Tag search results page', 'index', \App\Models\BlogTag::class);
        $this->storeRoute('blog.search.author', 'routes.blog/author/{blog_author_slug}', \App\Http\Controllers\Web\BlogSearchAuthorController::class, 'Author search results page', 'index', \App\Models\BlogAuthor::class);
        $this->storeRoute('blog.show', 'routes.blog/post/{blog_post_slug}', \App\Http\Controllers\Web\BlogController::class, 'Blog post page', 'show', \App\Models\BlogPost::class);
        $this->storeRoute('blog.preview', 'routes.blog/preview/{blog_post_slug}', \App\Http\Controllers\Web\BlogController::class, 'Blog post preview page', 'preview', \App\Models\BlogPost::class);
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
    protected function storeRoute($route_name, $uri_fullkey, $controller, $description, $method = 'index', $instance_type = null) {
        Page::firstOrCreate(
            [
                'route_name'  => $route_name,
                'uri_fullkey' => $uri_fullkey,
            ], 
            [                 
                'controller'  => $controller, 
                'method'      => $method, 
                'description' => $description,
                'instance_type' => $instance_type
            ]
        );
    }
}