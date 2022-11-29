<?php

namespace Tests\Unit\Caren;

use Tests\TestCase;
use App\Apis\Caren\Api;

class VendorListTest extends TestCase
{
    /**
     * @test
     * @group unit
     * @group api
     * @group api-caren
     * @group api-caren-vendors
     * @group external
     *
     * @return void
     */
    public function vendorListTest()
    {
        $api = new Api;
        $vendorList = $api->vendorList();

        $this->assertEquals([
            'Rentals' => [
                [
                    'Id' => 6,
                    'Name' => 'Lotus Car Rental',
                    'Logo' => '/Images/6/LOTUS_LOGO.png',
                    'MinimumBookingHoursInAdvance' => 10,
                ],
            ],
        ], $vendorList);
    }
}
