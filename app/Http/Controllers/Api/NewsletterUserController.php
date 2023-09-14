<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\JsonResponse;
use App\Traits\Controllers\Api\HasSeoConfigurations;
use Illuminate\Http\Request;
use App\Models\NewsletterUser;

class NewsletterUserController extends BaseController
{
    use HasSeoConfigurations;

    /**     
     * @lrd:start
     * ## creates or updates a newsletteruser when the newsletter form is submited and mark it as active
     * ## email: email of the user  
     * @QAparam email string 'required|email'
     * @lrd:end     
     */   
    public function submitted(Request $request):JsonResponse {
        
        $request->validate([
            'email' => 'required|email',        
        ]);
        
        $newsletterUser = NewsletterUser::updateOrCreate(
            ['email'  => $request->input('email')],            
            ['active' => 1]
        );

        $newsletterUser->save();
        
        return $this->successResponse($newsletterUser->toApiResponse($this->locale));                
    }    
       
}
