<?php

namespace Tests\Feature\Admin\Car;

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
        $this->vendor = $this->createVendor();
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

        $car1 = $this->createCar(['name' => 'Fistro']);
        $car2 = $this->createCar(['name' => 'Pecador']);
        $car3 = $this->createCar(['name' => 'Gromenauer']);

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
    }
}
