<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Translation;

class TranslationsController extends BaseController
{
    public function index() {
        return $this->successResponse($this->mapApiResponse(Translation::all()));
    }

    public function show(Translation $translation) {        
        if($translation->exists) {
            return $this->successResponse($translation->toApiResponse());
        } else {
            $this->notFoundError();

            return $this->errorResponse('the translation does not exist');
        }        
    }
}
