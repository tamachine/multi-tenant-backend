<?php

namespace Tests\Feature\Admin\Location;

use App\Http\Livewire\Admin\Location\Create;
use App\Models\Location;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected $caren_location;

    public function setUp(): void
    {
        parent::setUp();
        $this->admin = $this->createUser();
        $this->caren_location = $this->createCarenLocation();
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group location
     * @group location-create
     *
     * @return void
     */
    public function createLocationValidatesInput()
    {
        $this->actingAs($this->admin);

        Livewire::test(Create::class, ['caren_location' => $this->caren_location->id])
            ->set('name', null)
            ->call('saveLocation')
            ->assertHasErrors([
                'name' => ['required'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group location
     * @group location-create
     *
     * @return void
     */
    public function createLocationPostDataSaves()
    {
        $this->actingAs($this->admin);

        Livewire::test(Create::class, ['caren_location' => $this->caren_location->id])
            ->set('name', "Location 1")
            ->set('caren_location',  $this->caren_location->id)
            ->call('saveLocation')
            ->assertStatus(200);

        $location = Location::first();

        $this->assertEquals("Location 1", $location->name);
    }
}
