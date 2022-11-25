<?php

namespace Tests\Feature\Admin\Cars;

use App\Http\Livewire\Admin\Car\Index;
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
     * @group car
     * @group car-index
     *
     * @return void
     */
    public function userIndexShowsCarsAndFilters()
    {
        $this->actingAs($this->admin);

        $car1 = $this->createCar(['name' => 'Fistro', 'vendor_id' => $this->vendor1->id]);
        $car2 = $this->createCar(['name' => 'Pecador', 'vendor_id' => $this->vendor1->id]);
        $car3 = $this->createCar(['name' => 'Gromenauer', 'vendor_id' => $this->vendor2->id]);

        Livewire::test(Index::class)
            ->assertSee($car1->name)
            ->assertSee($car2->name)
            ->assertSee($car3->name);

        Livewire::test(Index::class)
            ->set('search', $car1->name)
            ->assertSee($car1->name)
            ->assertDontSee($car2->name)
            ->assertDontSee($car3->name);

        Livewire::test(Index::class)
            ->set('search', $car2->name)
            ->assertSee($car2->name)
            ->assertDontSee($car1->name)
            ->assertDontSee($car3->name);

        Livewire::test(Index::class)
            ->set('search', $car3->name)
            ->assertSee($car3->name)
            ->assertDontSee($car1->name)
            ->assertDontSee($car2->name);

        Livewire::test(Index::class)
            ->set('vendor', $this->vendor1->hashid)
            ->assertSee($car1->name)
            ->assertSee($car2->name)
            ->assertDontSee($car3->name);

        Livewire::test(Index::class)
            ->set('vendor', $this->vendor2->hashid)
            ->assertDontSee($car1->name)
            ->assertDontSee($car2->name)
            ->assertSee($car3->name);
    }
}
