<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationsController extends BaseController
{
    public function index(Request $request) {

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

    public function show(Translation $translation, Request $request) {        
        if($translation->exists) {  
            return $this->successResponse($translation->toApiResponse());
        } else {
            $this->notFoundError();

            return $this->errorResponse('the translation does not exist');
        }        
    }
}
