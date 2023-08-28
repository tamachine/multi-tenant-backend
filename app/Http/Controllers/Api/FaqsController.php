<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Builder;

class FaqsController extends BaseController
{
    /**     
     * @lrd:start
     * ## Returns all faqs
     * @lrd:end
     * @QAparam faq_category string nullable "hashid of the faq_category"
     * @QAparam locale string nullable 
     */
    public function index(Request $request):JsonResponse {

        $query = Faq::query();

        if($request->has('faq_category')) {
            $query->whereHas('faqCategories', function (Builder $query) use($request) {
                $query->where('hashid', $request->input('faq_category'));
            });
        }
       
        $this->checkLocale($request);        

        return $this->successResponse($this->mapApiResponse($query->get()));                
    }

    /**
     * @lrd:start
     * ## Returns one faq
     * ## faq_hashid: full_key of the translation 
     * @lrd:end    
     */
    public function show(Faq $faq):JsonResponse {                
        return $this->successResponse($faq->toApiResponse());                
    }        
}
