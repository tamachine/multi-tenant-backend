<?php

namespace Tests\Feature\Admin\Car;

use App\Http\Livewire\Admin\Car\Edit;
use App\Models\Car;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class EditTest extends TestCase
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
     * @group car-edit
     *
     * @return void
     */
    public function theEditCarPostDataFails()
    {
        $this->actingAs($this->admin);

        $car = $this->createCar();

        Livewire::test(Edit::class, ['car' => $car->hashid])
            ->set('name', null)
            ->set('car_code', null)
            ->set('year', null)
            ->call('saveCar')
            ->assertHasErrors([
                'name' => ['required'],
                'car_code' => ['required'],
                'year' => ['required'],
            ]);

        Livewire::test(Edit::class, ['car' => $car->hashid])
            ->set('year', 1950)
            ->call('saveCar')
            ->assertHasErrors([
                'year' => ['gte'],
            ]);

        Livewire::test(Edit::class, ['car' => $car->hashid])
            ->set('year', 2500)
            ->call('saveCar')
            ->assertHasErrors([
                'year' => ['lte'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group car
     * @group car-edit
     *
     * @return void
     */
    public function theEditCarPostDataSaves()
    {
        $this->actingAs($this->admin);

        $car = $this->createCar();

        Livewire::test(Edit::class, ['car' => $car->hashid])
            ->set('name', "Car 1")
            ->set('car_code', "CDMX")
            ->set('year', 2020)
            ->call('saveCar')
            ->assertStatus(200);

        $car = Car::first();

        $this->assertEquals("Car 1", $car->name);
        $this->assertEquals("CDMX", $car->car_code);
        $this->assertEquals(2020, $car->year);
    }
}
