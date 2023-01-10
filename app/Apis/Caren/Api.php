<?php

namespace App\Apis\Caren;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Api
{
    /***************************************************
     * PROPERTIES
     **************************************************/

    /**
     * @var String
     */
    private $apiKey = null;

    /**
     * @var String
     */
    private $username = null;

    /**
     * @var String
     */
    private $password = null;

    /**
     * Endpoint to be called stored in config/caren.php
     *
     * @var String
     */
    public $endpoint;

    /**
     * Json response from the lookup
     *
     * @var string
     */
    public $json;

    /***************************************************
     * METHODS
     **************************************************/

    /**
     * @param   string  $apiKey
     * @param   string  $username
     * @param   string  $password
     */
    public function __construct($apiKey = null, $username = null, $password = null)
    {
        $this->apiKey = $apiKey ? $apiKey : config('caren.apikey');
        $this->username = $username ? $username : config('caren.username');
        $this->password = $password ? $password : config('caren.password');

        if (!$this->apiKey || !$this->username || !$this->password) {
            throw new Exception('Missing Caren credentials. Set them in .env.');
        }
    }

    /**
     * Get the session ID from Caren or from the cache
     *
     * @return string
     */
    public function getSessionId()
    {
        $expiry = 20; // minutes
        $expiry_seconds = ($expiry * 60) - 10;

        return Cache::remember('caren_session_' . $this->apiKey, $expiry_seconds, function () {
            return $this->getSessionIdFromCaren();
        });
    }

    /**
     * Get the session ID from Caren
     *
     * @return string
     */
    public function getSessionIdFromCaren()
    {
        $data = [
            'ApiKey' => $this->apiKey,
            'Username' => $this->username,
            'Password' => $this->password,
        ];

        $response = Http::post(
            config('caren.url') . config('caren.endpoints.login'),
            $data
        );

        if ($response->status() != 200) {
            throw new Exception('Caren Session Error. Status: ' . $response->status());
        }

        $json = $response->json();

        if (!isset($json['Session']) || empty($json['Session'])) {
            throw new Exception('Caren Session Error. No Session returned.');
        }

        return $json['Session'];
    }

    /**
     * @param   array   $params
     * @return  array
     */
    public function post($params)
    {
        $params = array_merge($params, ["Session" => $this->getSessionId()]);
        $request = Http::withoutVerifying();
        $response = $request->post($this->getUrl(), $params);

        return $this->processResponse($response, $params);
    }

    /**
     * @param   array   $params
     * @return  array
     */
    public function get($params)
    {
        $params = array_merge($params, ["Session" => $this->getSessionId()]);
        $request = Http::withoutVerifying();
        $response = $request->get($this->getUrl(), $params);

        return $this->processResponse($response, $params);
    }

    /**
     * @param   object  $response
     * @param   array   $params
     * @return  array
     */
    public function processResponse($response, $params)
    {
        if ($response->status() != 200) {
            Log::error('Caren Error. ' . $response->body());
            throw new Exception('Caren Error. Status: ' . $response->status());
        }

        $this->json = $response->json();

        if (isset($this->json['error'])) {
            Log::error('Caren Error. ' . $response->body());
            Log::error($params);
            throw new Exception('Caren Error. ' . $response->body());
        }

        return $this->json;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return config('caren.url') . $this->endpoint;
    }

    /***************************************************
     * ENDPOINTS
     **************************************************/

    /**
     * @param   array   $params
     * @return  array
     */
    public function vendorList($params = [])
    {
        $this->endpoint = config('caren.endpoints.vendor_list');

        return $this->post($params);
    }

    /**
     * @param   array   $params
     * @return  array
     */
    public function pickupLocations($params = [])
    {
        $params = array_merge($params, [
            "ShowHours" => true,
        ]);

        $this->endpoint = config('caren.endpoints.pickup_locations');

        return $this->post($params);
    }

    /**
     * @param   array   $params
     * @return  array
     */
    public function dropoffLocations($params = [])
    {
        $params = array_merge($params, [
            "ShowHours" => true,
        ]);

        $this->endpoint = config('caren.endpoints.dropoff_locations');

        return $this->post($params);
    }

    /**
     * @param   array   $params
     * @return  array
     */
    public function fullCarList($params = [])
    {
        $params = array_merge($params, [
            "skipDateCheck" => true,
            "sortColumn" => "Id",
            "showPrices" => false
        ]);

        $this->endpoint = config('caren.endpoints.full_car_list');

        return $this->post($params);
    }

    /**
     * @param   string  $type (extra or insurance)
     * @param   array   $params
     * @return  array
     */
    public function extraList($type, $params = [])
    {
        if ($type == 'extra') {
            $this->endpoint = config('caren.endpoints.extra_list');
        } else {
            $this->endpoint = config('caren.endpoints.insurance_list');
        }


        return $this->post($params);
    }

    /**
     * @param   array   $params
     * @return  array
     */
    public function carsByDates($params = [])
    {
        $params = array_merge($params, [
            "sortColumn" => "Id",
            "showPrices" => false,
        ]);

        $this->endpoint = config('caren.endpoints.cars_by_dates');

        return $this->post($params);
    }
}
