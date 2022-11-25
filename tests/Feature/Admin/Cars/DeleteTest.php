<?php

namespace Tests\Feature\Admin\Cars;

use App\Http\Livewire\Admin\Car\Edit;
use App\Http\Livewire\Admin\Car\Index;
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
        $this->vendor = $this->createVendor();
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group car
     * @group car-delete
     *
     * @return void
     */
    public function deleteRequestSuccessfullyDeletesCar()
    {
        $this->actingAs($this->admin);

        $car = $this->createCar();

        // We should see the car
        Livewire::test(Index::class)
            ->assertSee($car->name);

        // Delete
        Livewire::test(Edit::class, ['car' => $car->hashid])
            ->call('deleteCar', $car->hashid)
            ->assertRedirect(route('car.index'));

        // We should not see the car
        Livewire::test(Index::class)
            ->assertDontSee($car->name);
    }
}
