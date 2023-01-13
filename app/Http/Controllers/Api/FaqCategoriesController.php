<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class FaqsCategoriesController extends BaseController
{
     /**
     * @lrd:start
     * ## Returns all faq categories that have faqs related.
     * @lrd:end     
     * @QAparam all boolean nullable set to true to return all faqs regardless of wether they have faqs related or not.
     */
    public function index(Request $request):JsonResponse {
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
