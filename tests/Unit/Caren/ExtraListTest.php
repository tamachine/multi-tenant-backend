<?php

namespace Tests\Unit\Caren;

use Tests\TestCase;
use App\Apis\Caren\Api;

class ExtraListTest extends TestCase
{
    /**
     * @test
     * @group unit
     * @group api
     * @group api-caren
     * @group api-caren-extras
     * @group external
     *
     * @return void
     */
    public function extraListTest()
    {
        $api = new Api;
        $carList = $api->extraList('extra', ["RentalId" => 11]);

        $this->assertEquals(15, count($carList['Extras']));
    }

    /**
     * @test
     * @group unit
     * @group api
     * @group api-caren
     * @group api-caren-extras
     * @group external
     *
     * @return void
     */
    public function insuranceListTest()
    {
        $api = new Api;
        $carList = $api->extraList('insurance', ["RentalId" => 11]);

        $this->assertEquals(7, count($carList['Insurances']));
    }
}
