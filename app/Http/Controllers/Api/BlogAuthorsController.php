<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\BlogAuthor;
use Illuminate\Http\JsonResponse;

class BlogAuthorsController extends BaseController
{

     /**
     * @lrd:start
     * ## Returns one blog author
     * ## blog_author_slug: slug of the author
     * @QAparam locale string nullable 
     * @lrd:end    
     */
    public function show(BlogAuthor $blogAuthor):JsonResponse {        

        $this->checkLocale(request());
        
        $response = $blogAuthor->toApiResponse();

        $this->changeKey($response, 'getFeaturedImageModelImageInstance', 'photo');

        return $this->successResponse($response);        
    }  
       
}
