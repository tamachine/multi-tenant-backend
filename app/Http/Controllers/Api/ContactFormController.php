<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Mail\ContactFormSubmitted;
use App\Models\ContactUser;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends BaseController
{
    /**     
     * @lrd:start
     * ## send contact email.
     * ## name: name of the user , email: email of the user, subject: subject contact form, type: general or booking, message: message contact form
     * @QAparam email string 'required|email'
     * @QAparam name  string 'required'
     * @QAparam subject string 'required'
     * @QAparam type string 'required'
     * @QAparam message string 'required' 
     * @lrd:end     
     */  
    public function submitted(Request $request):JsonResponse {
       
        $request->validate([
            'name'      => ['required'],
            'email'     => ['required', 'email'],
            'subject'   => ['required'],
            'type'      => ['required'],
            'message'   => ['required'],
        ]);

        Mail::to(config('settings.email.contact'))->send(new ContactFormSubmitted($request));

        $contactUser = ContactUser::firstOrCreate(
            $request->only('email')
        );
        
        $contactUser->contactuserdetails()->create(
            $request->only('name','type','subject','message') + ['contact_user_id' => $contactUser->id]
        );
        
        return $this->successResponse($contactUser->toApiResponse()); 
               
    }    
}
