<?php

namespace Tests\Feature\Admin\Car;

use App\Http\Livewire\Admin\Car\Create;
use App\Models\Car;
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
     * @group car
     * @group car-create
     *
     * @return void
     */
    public function createCarValidatesInput()
    {
        $this->actingAs($this->admin);

        Livewire::test(Create::class)
            ->set('name', null)
            ->set('vendor', null)
            ->call('saveCar')
            ->assertHasErrors([
                'name' => ['required'],
                'vendor' => ['required'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group car
     * @group car-create
     *
     * @return void
     */
    public function createCarPostDataSaves()
    {
        $this->actingAs($this->admin);

        Livewire::test(Create::class)
            ->set('name', "Car 1")
            ->set('vendor', $this->vendor->hashid)
            ->call('saveCar')
            ->assertStatus(200);

        $car = Car::first();

        $this->assertEquals("Car 1", $car->name);
        $this->assertEquals($this->vendor->id, $car->vendor_id);
    }
}