<?php

namespace Tests\Unit\Caren;

use Tests\TestCase;
use App\Apis\Caren\Api;

class LocationsTest extends TestCase
{
    /**
     * @test
     * @group unit
     * @group api
     * @group api-caren
     * @group api-caren-locations
     * @group external
     *
     * @return void
     */
    public function pickupLocationsTest()
    {
        $api = new Api;
        $pickupLocations = $api->pickupLocations(["RentalId" => 11]);

        $this->assertEquals(2, count($pickupLocations['Locations']));
    }

    /**
     * @test
     * @group unit
     * @group api
     * @group api-caren
     * @group api-caren-locations
     * @group external
     *
     * @return void
     */
    public function dropoffLocationsTest()
    {
        $api = new Api;
        $dropoffLocations = $api->dropoffLocations(["RentalId" => 11]);

        $this->assertEquals(2, count($dropoffLocations['Locations']));
    }
}
