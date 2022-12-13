<?php

namespace Tests\Feature\Admin\Extra;

use App\Http\Livewire\Admin\Extra\Index;
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
        $this->vendor1 = $this->createVendor();
        $this->vendor2 = $this->createVendor();
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group extra
     * @group extra-index
     *
     * @return void
     */
    public function extraIndexShowsExtrasAndFilters()
    {
        $this->actingAs($this->admin);

        $extra1 = $this->createExtra(['name' => 'Fistro', 'vendor_id' => $this->vendor1->id]);
        $extra2 = $this->createExtra(['name' => 'Pecador', 'vendor_id' => $this->vendor1->id]);
        $extra3 = $this->createExtra(['name' => 'Gromenauer', 'vendor_id' => $this->vendor2->id]);

        Livewire::test(Index::class)
            ->assertSee($extra1->name)
            ->assertSee($extra2->name)
            ->assertSee($extra3->name);

        Livewire::test(Index::class)
            ->set('search', $extra1->name)
            ->assertSee($extra1->name)
            ->assertDontSee($extra2->name)
            ->assertDontSee($extra3->name);

        Livewire::test(Index::class)
            ->set('search', $extra2->name)
            ->assertSee($extra2->name)
            ->assertDontSee($extra1->name)
            ->assertDontSee($extra3->name);

        Livewire::test(Index::class)
            ->set('search', $extra3->name)
            ->assertSee($extra3->name)
            ->assertDontSee($extra1->name)
            ->assertDontSee($extra2->name);

        Livewire::test(Index::class)
            ->set('vendor', $this->vendor1->hashid)
            ->assertSee($extra1->name)
            ->assertSee($extra2->name)
            ->assertDontSee($extra3->name);

        Livewire::test(Index::class)
            ->set('vendor', $this->vendor2->hashid)
            ->assertDontSee($extra1->name)
            ->assertDontSee($extra2->name)
            ->assertSee($extra3->name);
    }
}
