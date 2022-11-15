<?php

namespace Tests\Feature\Admin\Vendor;

use App\Http\Livewire\Admin\Vendor\Locations;
use App\Models\VendorLocation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class LocationsTest extends TestCase
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
     * @group vendor-locations
     *
     * @return void
     */
    public function theVendorLocationsPostDataFails()
    {
        $this->actingAs($this->admin);

        $lines = [
            [
                'id'        => $this->location1->id,
                'name'      => $this->location1->name,
                'available' => true,
                'price'     => -1,
            ],
            [
                'id'        => $this->location2->id,
                'name'      => $this->location2->name,
                'available' => true,
                'price'     => 'fistro',
            ]
        ];

        Livewire::test(Locations::class, ['vendor' => $this->vendor->hashid])
            ->set('lines', $lines)
            ->call('saveLocations')
            ->assertHasErrors([
                'lines.0.price' => ['gte'],
                'lines.1.price' => ['numeric'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group vendor
     * @group vendor-locations
     *
     * @return void
     */
    public function theVendorLocationsPostDataSaves()
    {
        $this->actingAs($this->admin);

        $lines = [
            [
                'id'        => $this->location1->id,
                'name'      => $this->location1->name,
                'available' => true,
                'price'     => 0,
            ],
            [
                'id'        => $this->location2->id,
                'name'      => $this->location2->name,
                'available' => true,
                'price'     => 500,
            ]
        ];

        Livewire::test(Locations::class, ['vendor' => $this->vendor->hashid])
            ->set('lines', $lines)
            ->call('saveLocations')
            ->assertStatus(200);

        $vendorLocation = VendorLocation::find(1);
        $this->assertEquals($this->location1->id, $vendorLocation->location_id);
        $this->assertEquals(0, $vendorLocation->price);

        $vendorLocation = VendorLocation::find(2);
        $this->assertEquals($this->location2->id, $vendorLocation->location_id);
        $this->assertEquals(500, $vendorLocation->price);
    }
}
