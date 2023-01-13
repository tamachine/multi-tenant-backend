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

        $query = Translation::query(); 

        if ($request->has('group')) { //if group is set, it returns only the group passed
            $query->where('group', $request->input('group'));
        } 

        $this->checkLocale($request);

        if ($this->locale) { //if locale is set, it returns only the locale passed
            $selects = [
                'text->'.$request->input('locale'). ' as text',
                'group',
                'key'
            ];
            
            $query->select($selects);
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
        if($translation->exists) {  
            return $this->successResponse($translation->toApiResponse());
        } else {
            $this->notFoundError();

            return $this->errorResponse("the translation does not exist");
        }        
    }    
}
