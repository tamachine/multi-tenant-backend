<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TranslationsController extends BaseController
{
    /**
     * Returns all translations based on group and locale (if set)
     * @var string group   
     * @var string locale
     */
    public function index(Request $request):JsonResponse {

        $query = Translation::query(); 

        if ($request->has('group')) {
            $query->where('group', $request->input('group'));
        } 

        if ($request->has('locale')) {
            $selects = [
                'text->'.$request->input('locale'). ' as text',
                'group',
                'key'
            ];
            
            $query->select($selects);

            return $this->successResponse($this->mapApiResponse($query->get()));
        } else {
            return $this->successResponse($this->mapApiResponse($query->get()));
        }        
    }

    public function show(Translation $translation):JsonResponse {        
        if($translation->exists) {  
            return $this->successResponse($translation->toApiResponse());
        } else {
            $this->notFoundError();

            return $this->errorResponse('the translation does not exist');
        }        
    }
}
