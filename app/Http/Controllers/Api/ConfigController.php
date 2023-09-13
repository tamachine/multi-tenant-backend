<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\JsonResponse;
use App\Models\Language;
use App\Models\Currency;

class ConfigController extends BaseController
{

     /**
     * @lrd:start
     * ## Returns general configuration. Currencies and languages.
     * @lrd:end           
     */
    public function index():JsonResponse {      

        $config = [];

        $languages = Language::all();
        $config['languages']['data']  = $languages;

        $currencies = Currency::all();
        $config['currencies']['data']  = $currencies;

        return $this->successResponse($config);
    }


}
