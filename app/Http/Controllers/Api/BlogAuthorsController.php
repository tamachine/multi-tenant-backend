<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\BlogAuthor;
use App\Models\Page;
use App\Traits\Controllers\Api\HasSeoConfigurations;
use Illuminate\Http\JsonResponse;

class BlogAuthorsController extends BaseController
{
    use HasSeoConfigurations;

     /**
     * @lrd:start
     * ## Returns one blog author
     * ## blog_author_slug: slug of the author
     * @QAparam locale string nullable 
     * @lrd:end    
     */
    public function show(BlogAuthor $blogAuthor):JsonResponse {        

        $this->checkLocale(request());
        
        return $this->successResponse($blogAuthor->toApiResponse());        
    }  
       
    /**
     * @lrd:start
     * ## Returns the seo configurations for a blogauthor
     * ## blog_author_slug: slug of the author
     * ## page_name: route_name of the page
     * @QAparam locale string nullable 
     * @lrd:end    
     */
    public function seoConfigurations(BlogAuthor $blogAuthor, Page $page):JsonResponse {
        return $this->seoConfigurationsResponse($blogAuthor, $page);                
    }
}
