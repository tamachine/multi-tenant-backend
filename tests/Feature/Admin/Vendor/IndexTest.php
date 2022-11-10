<?php

namespace Tests\Feature\Admin\Vendor;

use App\Http\Livewire\Admin\Vendor\Index;
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
     * @group vendor
     * @group vendor-index
     *
     * @return void
     */
    public function userIndexShowsVendorsAndFilters()
    {
        $this->actingAs($this->admin);

        $vendor1 = $this->createVendor(['name' => 'Fistro', 'vendor_code' => 'FST']);
        $vendor2 = $this->createVendor(['name' => 'Pecador', 'vendor_code' => 'PCR']);
        $vendor3 = $this->createVendor(['name' => 'Gromenauer', 'vendor_code' => 'GRM']);

        Livewire::test(Index::class)
            ->assertSee($vendor1->name)
            ->assertSee($vendor2->name)
            ->assertSee($vendor3->name);

        Livewire::test(Index::class)
            ->set('search', $vendor1->name)
            ->assertSee($vendor1->name)
            ->assertDontSee($vendor2->name)
            ->assertDontSee($vendor3->name);

        Livewire::test(Index::class)
            ->set('search', $vendor2->name)
            ->assertSee($vendor2->name)
            ->assertDontSee($vendor1->name)
            ->assertDontSee($vendor3->name);

        Livewire::test(Index::class)
            ->set('search', $vendor3->name)
            ->assertSee($vendor3->name)
            ->assertDontSee($vendor1->name)
            ->assertDontSee($vendor2->name);
    }
}
