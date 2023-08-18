<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\JsonResponse;
use App\Models\Page;
use App\Traits\Controllers\Api\HasSeoConfigurations;
use RoutesForPages;

class PagesController extends BaseController
{
    use HasSeoConfigurations;

    public function __construct() {
        RoutesForPages::registerRoutes();
    }
    /**     
     * @lrd:start
     * ## Returns all pages
     * @lrd:end     
     */
    public function index():JsonResponse {

        $query = Page::query(); 

        return $this->successResponse($this->mapApiResponse($query->get()));                
    }

    /**
     * @lrd:start
     * ## Returns one faq
     * ## name: name of the route
     * @lrd:end    
     */
    public function show(Page $page):JsonResponse {                
        return $this->successResponse($page->toApiResponse());                
    }  

    /**
     * @lrd:start
     * ## Returns the seo configurations for a page     
     * ## page_name: route_name of the page
     * @QAparam locale string nullable 
     * @lrd:end    
     */
    public function seoConfigurations(Page $page):JsonResponse {
        return $this->seoConfigurationsResponse($page, $page);                
    }
    
}
