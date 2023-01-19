<?php

namespace Tests\Feature\Admin\Cars;

use App\Http\Livewire\Admin\Car\Locations;
use App\Models\CarLocation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class LocationsTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected $vendor;
    protected $location;

    public function setUp(): void
    {
        parent::setUp();
        $this->admin = $this->createUser();
        $this->vendor = $this->createVendor();
        $this->location = $this->createLocation();
        $this->vendor->vendorLocations()->create([
            'location_id'   => $this->location->id
        ]);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group car
     * @group car-locations
     *
     * @return void
     */
    public function theAddLocationPostDataFails()
    {
        $this->actingAs($this->admin);

        $car = $this->createCar();

        Livewire::test(Locations::class, ['car' => $car->hashid])
            ->set('location', null)
            ->call('addLocation')
            ->assertHasErrors([
                'location' => ['required'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group car
     * @group car-locations
     *
     * @return void
     */
    public function theAddLocationPostDataSaves()
    {
        $this->actingAs($this->admin);

        $car = $this->createCar();

        Livewire::test(Locations::class, ['car' => $car->hashid])
            ->set('location', $this->location->hashid)
            ->set('open_from', '00:00')
            ->set('open_to', '23:30')
            ->set('pickup_available', 1)
            ->set('dropoff_available', 1)
            ->call('addLocation')
            ->assertStatus(200);

        $carLocation = CarLocation::first();

        $this->assertEquals($this->location->id, $carLocation->location_id);
        $this->assertEquals("00:00", $carLocation->open_from->format('H:i'));
        $this->assertEquals("23:30", $carLocation->open_to->format('H:i'));
        $this->assertEquals(1, $carLocation->pickup_available);
        $this->assertEquals(1, $carLocation->dropoff_available);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group car
     * @group car-locations
     *
     * @return void
     */
    public function theEditDatePostDataSaves()
    {
        $this->actingAs($this->admin);

        $car = $this->createCar();

        $car->carLocations()->create([
            'location_id'       => $this->location->id,
            'open_from'         => '00:00',
            'open_to'           => '23:30',
            'pickup_available'  => 1,
            'dropoff_available' => 1,
        ]);

        $currentLocations = [
            [
                'id'                => 1,
                'location'          => $this->location->name,
                'open_from'         => '08:00',
                'open_to'           => '18:30',
                'pickup_available'  => 0,
                'dropoff_available' => 0,
            ]
        ];

        Livewire::test(Locations::class, ['car' => $car->hashid])
            ->set('currentLocations', $currentLocations)
            ->call('editLocation', 0)
            ->assertStatus(200);

        $carLocation = CarLocation::first();

        $this->assertEquals($this->location->id, $carLocation->location_id);
        $this->assertEquals("08:00", $carLocation->open_from->format('H:i'));
        $this->assertEquals("18:30", $carLocation->open_to->format('H:i'));
        $this->assertEquals(0, $carLocation->pickup_available);
        $this->assertEquals(0, $carLocation->dropoff_available);
    }

     /**
     * @test
     * @group feature
     * @group admin
     * @group car
     * @group car-locations
     *
     * @return void
     */
    public function deleteRequestSuccessfullyDeletesDate()
    {
        $this->actingAs($this->admin);

        $car = $this->createCar();

        $car->carLocations()->create([
            'location_id'       => $this->location->id,
            'open_from'         => '00:00',
            'open_to'           => '23:30',
            'pickup_available'  => 1,
            'dropoff_available' => 1,
        ]);

        // The location should be in the array
        Livewire::test(Locations::class, ['car' => $car->hashid])
            ->assertSet('currentLocations', [
                [
                    'id'                => 1,
                    'location'          => $this->location->name,
                    'open_from'         => '00:00',
                    'open_to'           => '23:30',
                    'pickup_available'  => 1,
                    'dropoff_available' => 1
                ]
            ]);

        // Delete location
        Livewire::test(Locations::class, ['car' => $car->hashid])
            ->call('deleteLocation', 1)
            ->assertStatus(200);

        // The location should not be in the array
        Livewire::test(Locations::class, ['car' => $car->hashid])
            ->assertSet('currentLocations', []);
    }
}
