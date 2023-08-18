<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\JsonResponse;
use App\Models\BlogPost;
use App\Models\Page;
use App\Traits\Controllers\Api\HasSeoConfigurations;
use Illuminate\Http\Request;

class BlogPostsController extends BaseController
{
    use HasSeoConfigurations;

    /**     
     * @lrd:start
     * ## Returns all posts 
     * @QAparam latest int nullable "latest n posts"
     * @QAparam locale string nullable 
     * @lrd:end     
     */
    public function index(Request $request):JsonResponse {

        $this->checkLocale($request);           

        $query = BlogPost::published()->orderBy('published_at', 'desc'); 

        if($request->has('latest')) {            
            if(is_int($request->input('latest'))) $query->take($request->input('latest'));            
        }                  

        return $this->successResponse($this->mapApiResponse($query->get()));                
    }

    /**
     * @lrd:start
     * ## Returns one blog post
     * ## blog_post_slug: slug of the post
     * @QAparam locale string nullable 
     * @lrd:end    
     */
    public function show(BlogPost $blogPost):JsonResponse {        

        $this->checkLocale(request());

        return $this->successResponse($blogPost->toApiResponse());        
    }    

    /**
     * @lrd:start
     * ## Returns the seo configurations for a blogpost
     * ## blog_post_slug: slug of the post
     * ## page_name: route_name of the page
     * @QAparam locale string nullable 
     * @lrd:end    
     */
    public function seoConfigurations(BlogPost $blogPost, Page $page):JsonResponse {
        return $this->seoConfigurationsResponse($blogPost, $page);                
    }
       
}
