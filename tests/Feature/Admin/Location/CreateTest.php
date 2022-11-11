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

    public function setUp(): void
    {
        parent::setUp();
        $this->admin = $this->createUser();
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

        Livewire::test(Create::class)
            ->set('name', null)
            ->call('saveLocation')
            ->assertHasErrors([
                'name' => ['required'],
            ]);

        $location = $this->createLocation();

        Livewire::test(Create::class)
            ->set('name', $location->name)
            ->call('saveLocation')
            ->assertHasErrors([
                'name' => ['unique'],
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

        Livewire::test(Create::class)
            ->set('name', "Location 1")
            ->set('pickup_show_input', 1)
            ->set('pickup_input_require', 0)
            ->set('pickup_input_info', 'Chichipapa')
            ->set('dropoff_show_input', 1)
            ->set('dropoff_input_require', 0)
            ->set('dropoff_input_info', 'Papachichi')
            ->call('saveLocation')
            ->assertStatus(200);

        $location = Location::first();

        $this->assertEquals("Location 1", $location->name);
        $this->assertEquals(1, $location->pickup_show_input);
        $this->assertEquals(0, $location->pickup_input_require);
        $this->assertEquals('Chichipapa', $location->pickup_input_info);
        $this->assertEquals(1, $location->dropoff_show_input);
        $this->assertEquals(0, $location->dropoff_input_require);
        $this->assertEquals('Papachichi', $location->dropoff_input_info);
    }
}
