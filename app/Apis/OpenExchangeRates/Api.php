<?php

namespace App\Apis\OpenExchangeRates;

use App\Models\Rate;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use App\Services\OpenExchangeSlackAlertsWhenApiFails;

class Api
{
    /***************************************************
     * PROPERTIES
     **************************************************/

    /**
     * @var String
     */
    private $url = "";

    /**
     * @var String
     */
    private $appId = "";

    /**
     * Json response from the lookup
     *
     * @var object
     */
    public $json;

    protected $openExchangeSlackAlertsWhenApiFails;

    /***************************************************
     * METHODS
     **************************************************/

    public function __construct()
    {
        $this->url   = config('open-exchange-rates.url');
        $this->appId = config('open-exchange-rates.app_id');

        $this->openExchangeSlackAlertsWhenApiFails = new OpenExchangeSlackAlertsWhenApiFails();
    }

    /**
     * Get the rates
     *
     * @return array
     */
    public function getRates()
    {
        $expiry = 10; // minutes
        $expiry_seconds = ($expiry * 60) - 10;

        //return Cache::remember('exchange_rates', 1, function () {
            try {                      
                $json = file_get_contents($this->url . $this->appId);

                throw new Exception('a');

                $this->openExchangeSlackAlertsWhenApiFails->worked();

                return json_decode($json, true)["rates"];
            } catch (Exception $e) {
                // If OpenExchangeRates fails, use the rates in the database
                $this->openExchangeSlackAlertsWhenApiFails->failed();               

                return Rate::all()->pluck('rate', 'code')->toArray();
            }
       // });
    }

    /**
     * Sync rates table with open exchange api
     */
    public function syncRates():void
    {

        $rates = $this->getRates();

        foreach(Rate::all() as $rate) {
            $code = $rate->code;

            if(isset($rates[$code])) {
                $rate->update(['rate' => $rates[$rate->code]]);
            }
            Log::info('Rates table updated: code: '.$code . ' to '.$rates[$code]);
        }

    }
}
