<?php

namespace Tests\Feature\Admin\Location;

use App\Http\Livewire\Admin\Location\Edit;
use App\Http\Livewire\Admin\Location\Index;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class DeleteTest extends TestCase
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
     * @group location-delete
     *
     * @return void
     */
    public function deleteRequestSuccessfullyDeletesLocation()
    {
        $this->actingAs($this->admin);

        $location = $this->createLocation();

        // We should see the location
        Livewire::test(Index::class)
            ->assertSee($location->name);

        // Delete
        Livewire::test(Edit::class, ['location' => $location->hashid])
            ->call('deleteLocation', $location->hashid)
            ->assertRedirect(route('intranet.location.index'));

        // We should not see the location
        Livewire::test(Index::class)
            ->assertDontSee($location->name);
    }
}
