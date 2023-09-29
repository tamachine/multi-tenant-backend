<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\JsonResponse;
use App\Models\BlogPost;
use App\Models\Page;
use App\Traits\Controllers\Api\HasSeoConfigurations;
use Dompdf\FrameDecorator\Block;
use Illuminate\Http\Request;
use PharIo\Manifest\Author;

class BlogPostsController extends BaseController
{
    use HasSeoConfigurations;

    /**     
     * @lrd:start
     * ## Returns all posts 
     * @QAparam latest integer nullable "latest n posts"     
     * @QAparam category_hashid string nullable "posts from category hashid"
     * @QAparam search string nullable "posts that include the search"
     * @QAparam tag_hash_id string nullable  "posts from tag hashid"
     * @QAparam author_hashid string nullable  "posts from author hashid"
     * @QAparam locale string nullable 
     * @lrd:end     
     */
    public function index(Request $request):JsonResponse {

        $this->checkLocale($request);           

        $query = BlogPost::published()->orderBy('published_at', 'desc'); 

        if($request->has('latest')) {            
            if(is_numeric($request->input('latest'))) $query->take($request->input('latest'));            
        }     
        
        if($request->has('category_hashid')) {            
            $categoryHashid = $request->input('category_hashid');

            $query->whereHas('category', function ($query) use ($categoryHashid) {
                $query->where('hashid', $categoryHashid );
            });     
        }  

        if($request->has('search')) {
            $query->livewireSearch($request->input('search'));
        }

        if($request->has('tag_hash_id')) {
            $tagHashId = $request->input('tag_hash_id');

            $query->whereHas('tags', function ($query) use ($tagHashId) {
                $query->where('hashid', $tagHashId);
            });
        }

        if($request->has('author_hashid')) {
            $authorHashId = $request->input('author_hashid');

            $query->whereHas('author', function ($query) use ($authorHashId) {
                $query->where('hashid', $authorHashId);
            });
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

        $this->addAttributesToApiResponse($blogPost, ['related_posts', 'prev_post', 'next_post']);        
       
        return $this->successResponse($blogPost->toApiResponse($this->locale));        
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
