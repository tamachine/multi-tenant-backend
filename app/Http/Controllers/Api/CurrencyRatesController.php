<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\JsonResponse;
use App\Apis\OpenExchangeRates\Api as RatesApi;

class CurrencyRatesController extends BaseController
{

     /**
     * @lrd:start
     * ## Returns all currency reates
     * @lrd:end           
     */
    public function index(RatesApi $ratesApi):JsonResponse {       
        return $this->successResponse($ratesApi->getRates());
    }


}
