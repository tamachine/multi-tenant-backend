<?php

namespace App\Apis\OpenExchangeRates;

use App\Models\Currency;
use App\Models\CurrencyRate;
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

        return Cache::remember('exchange_rates', $expiry_seconds, function () {
            try {                      
                $json = file_get_contents($this->url . $this->appId);                                

                $this->openExchangeSlackAlertsWhenApiFails->working(); //send message to slack when is working but before it was failing

                return json_decode($json, true)["rates"];
            } catch (Exception $e) {
                
                $this->openExchangeSlackAlertsWhenApiFails->failed(); //send message to slack              

                // If OpenExchangeRates fails, use the rates in the database
                return CurrencyRate::all()->pluck('rate', 'code')->toArray();
            }
        });
    }

    /**
     * Sync rates table with open exchange api
     */
    public function syncRates():void
    {
        $rates = $this->getRates();

        foreach(Currency::all() as $currency) {
            $code = $currency->code;

            CurrencyRate::updateOrCreate(
                ['currency_id' => $currency->id],
                ['rate' => $rates[$code]]
            );

            Log::info('Rates table updated: code: '.$code . ' to '.$rates[$code]);
        }

    }
}
