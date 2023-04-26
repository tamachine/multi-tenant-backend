<?php

namespace App\Apis\Caren;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;
use App\Exceptions\CarenTimeoutException;
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
     * @var String
     */
    private $url = null;

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
     * @param   string  $url
     */
    public function __construct($apiKey = null, $username = null, $password = null, $url = null)
    {
        $this->apiKey = $apiKey ? $apiKey : config('caren.apikey');
        $this->username = $username ? $username : config('caren.username');
        $this->password = $password ? $password : config('caren.password');
        $this->url = $url ? $url : config('caren.url');

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
            $this->url . config('caren.endpoints.login'),
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
     * @param $params
     * @return array|string
     * @throws Exception
     */
    public function post($params)
    {
        try {
            $params = array_merge($params, ["Session" => $this->getSessionId()]);
            $request = Http::withoutVerifying()->timeout(15);
            $response = $request->post($this->getUrl(), $params);

        } catch (ConnectionException $e) {
            Log::error('Caren Error. ' . $e->getMessage());
            Log::error('Se ha superado el tiempo de espera de la petición a Caren');
            return [];
        }
        return $this->processResponse($response, $params);

    }

    /**
     * @param $params
     * @return array|string
     * @throws Exception
     */
    public function get($params)
    {
        try {
            $params = array_merge($params, ["Session" => $this->getSessionId()]);
            $request = Http::withoutVerifying()->timeout(15);
            $response = $request->get($this->getUrl(), $params);

        } catch (ConnectionException $e) {
            Log::error('Caren Error. ' . $e->getMessage());
            Log::error('Se ha superado el tiempo de espera de la petición a Caren');
            return [];
        }
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
        return $this->url . $this->endpoint;
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

    /**
     * @param   array   $params
     * @return  array
     */
    public function getPrices($params = [])
    {
        $this->endpoint = config('caren.endpoints.get_prices');

        return $this->post($params);
    }

    /**
     * @param   array   $params
     * @return  array
     */
    public function createBooking($params = [])
    {
        $this->endpoint = config('caren.endpoints.create_booking');

        return $this->post($params);
    }

    /**
     * @param   array   $params
     * @return  array
     */
    public function editBooking($params = [])
    {
        $this->endpoint = config('caren.endpoints.edit_booking');

        return $this->post($params);
    }

    /**
     * @param   array   $params
     * @return  array
     */
    public function confirmBooking($params = [])
    {
        $this->endpoint = config('caren.endpoints.confirm_booking');

        return $this->post($params);
    }

    /**
     * @param   array   $params
     * @return  array
     */
    public function cancelBooking($params = [])
    {
        $this->endpoint = config('caren.endpoints.cancel_booking');

        return $this->post($params);
    }

    /**
     * @param   array   $params
     * @return  array
     */
    public function bookingInfo($params = [])
    {
        $this->endpoint = config('caren.endpoints.booking_info');

        return $this->post($params);
    }
}
