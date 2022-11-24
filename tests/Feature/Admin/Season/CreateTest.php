<?php

namespace Tests\Feature\Admin\Season;

use App\Http\Livewire\Admin\Season\Create;
use App\Models\Season;
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
        $this->vendor = $this->createVendor();
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group season
     * @group season-create
     *
     * @return void
     */
    public function createSeasonValidatesInput()
    {
        $this->actingAs($this->admin);

        Livewire::test(Create::class)
            ->set('name', null)
            ->set('vendor', null)
            ->set('min_days_season', null)
            ->set('start_date', null)
            ->set('end_date', null)
            ->set('season_discount', null)
            ->call('saveSeason')
            ->assertHasErrors([
                'name' => ['required'],
            ]);

        Livewire::test(Create::class)
            ->set('name', "Season 1")
            ->set('vendor', $this->vendor->hashid)
            ->set('min_days_season', 0)
            ->set('start_date', '18-11-2023')
            ->set('end_date', '18-12-2023')
            ->set('season_discount', -1)
            ->call('saveSeason')
            ->assertHasErrors([
                'min_days_season' => ['gte'],
                'season_discount' => ['gte'],
            ]);

        Livewire::test(Create::class)
            ->set('name', "Season 1")
            ->set('vendor', $this->vendor->hashid)
            ->set('min_days_season', 99)
            ->set('start_date', '18-11-2023')
            ->set('end_date', '18-12-2023')
            ->set('season_discount', 100)
            ->call('saveSeason')
            ->assertHasErrors([
                'min_days_season' => ['lte'],
                'season_discount' => ['lt'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group season
     * @group season-create
     *
     * @return void
     */
    public function createSeasonPostDataSaves()
    {
        $this->actingAs($this->admin);

        Livewire::test(Create::class)
            ->set('name', "Season 1")
            ->set('vendor', $this->vendor->hashid)
            ->set('min_days_season', 1)
            ->set('start_date', '18-11-2023')
            ->set('end_date', '18-12-2023')
            ->set('season_discount', 0)
            ->call('saveSeason')
            ->assertStatus(200);

        $season = Season::first();

        $this->assertEquals("Season 1", $season->name);
        $this->assertEquals($this->vendor->id, $season->vendor_id);
        $this->assertEquals(1, $season->min_days_season);
        $this->assertEquals('18-11-2023', $season->start_date->format('d-m-Y'));
        $this->assertEquals('18-12-2023', $season->end_date->format('d-m-Y'));
        $this->assertEquals(0, $season->season_discount);
    }
}
