<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Translation;
use Illuminate\Http\JsonResponse;

class TranslationGroupsController extends BaseController
{    
     /**
     * @lrd:start
     * ## Returns all translation groups
     * @lrd:end     
     */
    public function index():JsonResponse {
        $groups = Translation::select('group')->groupBy('group')->pluck('group');

        return $this->successResponse($groups->toArray());
    }

   
}
