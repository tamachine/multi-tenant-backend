<?php

namespace Tests\Unit\OpenExchangeRates;

use Tests\TestCase;
use App\Apis\OpenExchangeRates\Api;

class GetRatesTest extends TestCase
{
    /**
     * @test
     * @group unit
     * @group api
     * @group api-open-exchange-rates
     * @group external
     *
     * @return void
     */
    public function getSessionIdTest()
    {
        $api = new Api;
        $rates = $api->getRates();
        $this->assertTrue(is_object($rates));
    }
}
