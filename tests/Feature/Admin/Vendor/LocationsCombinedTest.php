<?php

namespace Tests\Feature\Admin\Vendor;

use App\Http\Livewire\Admin\Vendor\LocationsCombined;
use App\Models\VendorLocationFee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class LocationsCombinedTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->admin = $this->createUser();
        $this->vendor = $this->createVendor();
        $this->location1 = $this->createLocation();
        $this->location2 = $this->createLocation();
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group vendor
     * @group vendor-locations-combined
     *
     * @return void
     */
    public function theVendorLocationsCombinedPostDataFails()
    {
        $this->actingAs($this->admin);

        $lines = [
            $this->location1->id => [
                'name'  => $this->location1->name,
                'fees'  => [
                    $this->location2->id => -1
                ]
            ],
            $this->location2->id => [
                'name'  => $this->location2->name,
                'fees'  => [
                    $this->location1->id => 'fistro'
                ]
            ]
        ];

        Livewire::test(LocationsCombined::class, ['vendor' => $this->vendor->hashid])
            ->set('lines', $lines)
            ->call('saveLocations')
            ->assertHasErrors([
                'lines.1.fees.2' => ['gte'],
                'lines.2.fees.1' => ['numeric'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group vendor
     * @group vendor-locations-combined
     *
     * @return void
     */
    public function theVendorLocationsPostDataSaves()
    {
        $this->actingAs($this->admin);

        $lines = [
            $this->location1->id => [
                'name'  => $this->location1->name,
                'fees'  => [
                    $this->location2->id => 0
                ]
            ],
            $this->location2->id => [
                'name'  => $this->location2->name,
                'fees'  => [
                    $this->location1->id => 500
                ]
            ]
        ];

        Livewire::test(LocationsCombined::class, ['vendor' => $this->vendor->hashid])
            ->set('lines', $lines)
            ->call('saveLocations')
            ->assertStatus(200);

        $vendorLocationFee = VendorLocationFee::find(1);
        $this->assertEquals($this->location1->id, $vendorLocationFee->location_pickup);
        $this->assertEquals($this->location2->id, $vendorLocationFee->location_dropoff);
        $this->assertEquals(0, $vendorLocationFee->fee);

        $vendorLocationFee = VendorLocationFee::find(2);
        $this->assertEquals($this->location2->id, $vendorLocationFee->location_pickup);
        $this->assertEquals($this->location1->id, $vendorLocationFee->location_dropoff);
        $this->assertEquals(500, $vendorLocationFee->fee);
    }
}
