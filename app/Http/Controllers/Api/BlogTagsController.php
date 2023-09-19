<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\JsonResponse;
use App\Models\BlogTag;
use App\Traits\Controllers\Api\HasSeoConfigurations;
use Illuminate\Http\Request;

class BlogTagsController extends BaseController
{
    use HasSeoConfigurations;

    /**     
     * @lrd:start
     * ## Returns all posts 
     * @QAparam postsPublished boolean nullable "tags that have published posts"
     * @QAparam locale string nullable 
     * @lrd:end     
     */
    public function index(Request $request):JsonResponse {

        $this->checkLocale($request);           

        $query = BlogTag::query(); 

        if($request->has('postsPublished')) {            
            if($this->castBool($request->input('postsPublished'))) $query->has('postsPublished');            
        }                  

        return $this->successResponse($this->mapApiResponse($query->get()));                
    }    

     /**
     * @lrd:start
     * ## Returns one blog tag
     * ## blog_author_slug: slug of the tag
     * @QAparam locale string nullable 
     * @lrd:end    
     */
    public function show(BlogTag $blogTag):JsonResponse {        

        $this->checkLocale(request());
        
        return $this->successResponse($blogTag->toApiResponse($this->locale));        
    }  
       
}
