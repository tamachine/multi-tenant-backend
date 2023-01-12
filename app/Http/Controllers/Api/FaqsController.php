<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\FaqCategory;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Builder;
use App\Helpers\Language;

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

        if($this->locale) {
            $selects = [
                'question->'.$request->input('locale'). ' as question',                
                'answer->'.$request->input('locale'). ' as answer',                
                'hashid'
            ];
            
            $query->select($selects);    
        }

        return $this->successResponse($this->mapApiResponse($query->get()));                
    }

    /**
     * @lrd:start
     * ## Returns one faq
     * ## faq_hashid: full_key of the translation 
     * @lrd:end    
     */
    public function show(Faq $faq):JsonResponse {        
        if($faq->exists) {  
            return $this->successResponse($faq->toApiResponse());
        } else {
            $this->notFoundError();

            return $this->errorResponse("the faq does not exist");
        }        
    }

     /**
     * @lrd:start
     * ## Returns all faq categories that have faqs related.
     * @lrd:end     
     * @QAparam all boolean nullable set to true to return all faqs regardless of wether they have faqs related or not.
     */
    public function categories(Request $request):JsonResponse {
        $query = FaqCategory::withCount('faqs');

        $all = false;

        if ($request->has('all')) {                         
            $all = $this->castBool($request->input('all'));               
        } 

        if (!$all) {
            $query->having('faqs_count', '>', 0);
        }

        return $this->successResponse($this->mapApiResponse($query->get()));
    }

   
}
