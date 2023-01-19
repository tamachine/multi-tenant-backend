<?php

namespace Tests\Feature\Admin\Season;

use App\Http\Livewire\Admin\Season\Index;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected $vendor1;
    protected $vendor2;

    public function setUp(): void
    {
        parent::setUp();
        $this->admin = $this->createUser();
        $this->vendor1 = $this->createVendor();
        $this->vendor2 = $this->createVendor();
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group season
     * @group season-index
     *
     * @return void
     */
    public function seasonIndexShowsSeasonsAndFilters()
    {
        $this->actingAs($this->admin);

        $season1 = $this->createSeason(['name' => 'Fistro', 'vendor_id' => $this->vendor1->id]);
        $season2 = $this->createSeason(['name' => 'Pecador', 'vendor_id' => $this->vendor1->id]);
        $season3 = $this->createSeason(['name' => 'Gromenauer', 'vendor_id' => $this->vendor2->id]);

        Livewire::test(Index::class)
            ->assertSee($season1->name)
            ->assertSee($season2->name)
            ->assertSee($season3->name);

        Livewire::test(Index::class)
            ->set('search', $season1->name)
            ->assertSee($season1->name)
            ->assertDontSee($season2->name)
            ->assertDontSee($season3->name);

        Livewire::test(Index::class)
            ->set('search', $season2->name)
            ->assertSee($season2->name)
            ->assertDontSee($season1->name)
            ->assertDontSee($season3->name);

        Livewire::test(Index::class)
            ->set('search', $season3->name)
            ->assertSee($season3->name)
            ->assertDontSee($season1->name)
            ->assertDontSee($season2->name);

        Livewire::test(Index::class)
            ->set('vendor', $this->vendor1->hashid)
            ->assertSee($season1->name)
            ->assertSee($season2->name)
            ->assertDontSee($season3->name);

        Livewire::test(Index::class)
            ->set('vendor', $this->vendor2->hashid)
            ->assertDontSee($season1->name)
            ->assertDontSee($season2->name)
            ->assertSee($season3->name);
    }
}
