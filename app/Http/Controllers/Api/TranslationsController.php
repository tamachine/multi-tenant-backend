<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TranslationsController extends BaseController
{
    /**     
     * @lrd:start
     * ## Returns all translations
     * @lrd:end
     * @QAparam group string nullable 
     * @QAparam locale string nullable
     */
    public function index(Request $request):JsonResponse {

        $this->checkLocale($request);    

        $query = Translation::query(); 

        if ($request->has('group')) { //if group is set, it returns only the group passed
            $query->where('group', $request->input('group'));
        } 
                 
        return $this->successResponse($this->mapApiResponse($query->get()));                
    }

    /**
     * @lrd:start
     * ## Returns one translation
     * ## translation_full_key: full_key of the translation (e.g.:home.title)
     * @lrd:end    
     */
    public function show(Translation $translation):JsonResponse {     
        $this->checkLocale(request());                

        return $this->successResponse($translation->toApiResponse($this->locale));                
    }    
}
