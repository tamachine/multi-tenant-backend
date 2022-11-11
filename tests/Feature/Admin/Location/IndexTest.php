<?php

namespace Tests\Feature\Admin\Location;

use App\Http\Livewire\Admin\Location\Index;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class IndexTest extends TestCase
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
     * @group location-index
     *
     * @return void
     */
    public function userIndexShowsLocationsAndFilters()
    {
        $this->actingAs($this->admin);

        $location1 = $this->createLocation(['name' => 'Fistro']);
        $location2 = $this->createLocation(['name' => 'Pecador']);
        $location3 = $this->createLocation(['name' => 'Gromenauer']);

        Livewire::test(Index::class)
            ->assertSee($location1->name)
            ->assertSee($location2->name)
            ->assertSee($location3->name);

        Livewire::test(Index::class)
            ->set('search', $location1->name)
            ->assertSee($location1->name)
            ->assertDontSee($location2->name)
            ->assertDontSee($location3->name);

        Livewire::test(Index::class)
            ->set('search', $location2->name)
            ->assertSee($location2->name)
            ->assertDontSee($location1->name)
            ->assertDontSee($location3->name);

        Livewire::test(Index::class)
            ->set('search', $location3->name)
            ->assertSee($location3->name)
            ->assertDontSee($location1->name)
            ->assertDontSee($location2->name);
    }
}
