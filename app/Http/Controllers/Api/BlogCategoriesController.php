<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\JsonResponse;
use App\Models\BlogCategory;
use App\Models\Page;
use App\Traits\Controllers\Api\HasSeoConfigurations;
use Illuminate\Http\Request;

class BlogCategoriesController extends BaseController
{

    use HasSeoConfigurations;

    /**     
     * @lrd:start
     * ## Returns all posts      
     * @QAparam postsPublished boolean nullable "categories that have published posts"
     * @QAparam locale string nullable 
     * @lrd:end     
     */
    public function index(Request $request):JsonResponse {

        $this->checkLocale($request);           

        $query = BlogCategory::query();    
        
        if($request->has('postsPublished')) {            
            if($this->castBool($request->input('postsPublished'))) $query->has('postsPublished');            
        }   

        return $this->successResponse($this->mapApiResponse($query->get()));                
    }    

     /**
     * @lrd:start
     * ## Returns one blog category
     * ## blog_category_slug: slug of the author
     * @QAparam locale string nullable 
     * @lrd:end    
     */
    public function show(BlogCategory $blogCategory):JsonResponse {        

        $this->checkLocale(request());
        
        return $this->successResponse($blogCategory->toApiResponse());        
    }  

     /**
     * @lrd:start
     * ## Returns the seo configurations for a blog category
     * ## blog_author_slug: slug of the category
     * ## page_name: route_name of the page
     * @QAparam locale string nullable 
     * @lrd:end    
     */
    public function seoConfigurations(BlogCategory $blogCategory, Page $page):JsonResponse {
        return $this->seoConfigurationsResponse($blogCategory, $page);                
    }
       
}
