<?php

namespace Tests\Unit\OpenExchangeRates;

use App\Apis\OpenExchangeRates\Api;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetRatesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @group unit
     * @group api
     * @group api-open-exchange-rates
     * @group external
     *
     * @return void
     */
    public function getRatesTest()
    {
        $api = new Api;
        $rates = $api->getRates();
        $this->assertTrue(is_object($rates));
    }
}
