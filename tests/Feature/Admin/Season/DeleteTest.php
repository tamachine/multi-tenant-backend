<?php

namespace Tests\Feature\Admin\Season;

use App\Http\Livewire\Admin\Season\Index;
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
     * @group season
     * @group season-delete
     *
     * @return void
     */
    public function deleteRequestSuccessfullyDeletesSeason()
    {
        $this->actingAs($this->admin);

        $this->vendor = $this->createVendor();
        $season = $this->createSeason();

        // We should see the season
        Livewire::test(Index::class)
            ->assertSee($season->name);

        // Delete
        Livewire::test(Index::class, ['season' => $season->hashid])
            ->call('deleteSeason', $season->hashid)
            ->assertRedirect(route('season.index'));

        // We should not see the season
        Livewire::test(Index::class)
            ->assertDontSee($season->name);
    }
}
