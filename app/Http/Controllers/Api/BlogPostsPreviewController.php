<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\BlogPost;
use Illuminate\Http\JsonResponse;
use Laravel\Sanctum\PersonalAccessToken;
use Carbon\Carbon;

class BlogPostsPreviewController extends BaseController
{
    protected $blogPostsController;

    public function __construct(BlogPostsController $blogPostsController) {
        $this->blogPostsController = $blogPostsController;
    }
   
    /**     
     * @lrd:start
     * ## Verifies if the token is valid and if its valid, returns the corresponding blogpost
     * ## api_blog_post_slug: blog post to be previewed
     * ## api_preview_token: token to be validated
     * @QAparam locale string nullable 
     * @lrd:end     
     */
    public function verify(BlogPost $blogPost, string $token):JsonResponse {

        $tokenObject = PersonalAccessToken::findToken($token);

        $valid = ($tokenObject && Carbon::now()->lt($tokenObject?->expires_at));       
        
        $data['valid'] = $valid;

        if($valid) {
            request()->merge(['locale' => request('locale')]);

            $data['post'] = $this->blogPostsController->show($blogPost)->getData();
        } 

        return $this->successResponse($data);        
    }
       
}
