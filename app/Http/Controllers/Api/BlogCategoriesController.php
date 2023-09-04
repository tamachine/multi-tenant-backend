<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\JsonResponse;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoriesController extends BaseController
{

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
       
}
