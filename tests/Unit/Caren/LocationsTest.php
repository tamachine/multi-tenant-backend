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
        $pickupLocations = $api->pickupLocations(["RentalId" => 6]);

        $this->assertEquals([
            'Locations' => [
                [
                    "Id" => 8,
                    "Name" => "Address in Reykjavik",
                    "Description" => "",
                    "ExtraInfo" => true,
                    "ExtraInfoText" => "",
                    "SelfService" => false,
                    "Times" => []
                ],
                [
                    "Id" => 9,
                    "Name" => "Address in Keflavik",
                    "Description" => "",
                    "ExtraInfo" => true,
                    "ExtraInfoText" => "",
                    "SelfService" => false,
                    "Times" => []
                ],
                [
                    "Id" => 486,
                    "Name" => "Keflavik International Airport",
                    "Description" => "",
                    "ExtraInfo" => false,
                    "ExtraInfoText" => "",
                    "SelfService" => false,
                    "Times" => []
                ],
            ]
        ], $pickupLocations);
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
        $dropoffLocations = $api->dropoffLocations(["RentalId" => 6]);

        $this->assertEquals([
            'Locations' => [
                [
                    "Id" => 8,
                    "Name" => "Address in Reykjavik",
                    "Description" => "",
                    "ExtraInfo" => true,
                    "ExtraInfoText" => "",
                    "SelfService" => false,
                    "Times" => []
                ],
                [
                    "Id" => 9,
                    "Name" => "Address in Keflavik",
                    "Description" => "",
                    "ExtraInfo" => true,
                    "ExtraInfoText" => "",
                    "SelfService" => false,
                    "Times" => []
                ],
                [
                    "Id" => 487,
                    "Name" => "Keflavik International Airport",
                    "Description" => "",
                    "ExtraInfo" => false,
                    "ExtraInfoText" => "",
                    "SelfService" => false,
                    "Times" => []
                ],
            ]
        ], $dropoffLocations);
    }
}
