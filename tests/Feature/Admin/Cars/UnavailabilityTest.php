<?php

namespace Tests\Feature\Admin\Cars;

use App\Http\Livewire\Admin\Car\Unavailability;
use App\Models\CarUnavailable;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class UnavailabilityTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected $vendor;

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
     * @group car-unavailability
     *
     * @return void
     */
    public function theAddDatePostDataFails()
    {
        $this->actingAs($this->admin);

        $car = $this->createCar();

        Livewire::test(Unavailability::class, ['car' => $car->hashid])
            ->set('start_date', null)
            ->set('end_date', null)
            ->call('addDate')
            ->assertHasErrors([
                'start_date' => ['required'],
                'end_date' => ['required'],
            ]);

        Livewire::test(Unavailability::class, ['car' => $car->hashid])
            ->set('start_date', 'chichipapa')
            ->set('end_date', ['what' => 'the fuck'])
            ->call('addDate')
            ->assertHasErrors([
                'start_date' => ['date'],
                'end_date' => ['date'],
            ]);

        Livewire::test(Unavailability::class, ['car' => $car->hashid])
            ->set('start_date', '25-11-2022')
            ->set('end_date', '23-11-2022')
            ->call('addDate')
            ->assertHasErrors([
                'end_date' => ['after'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group car
     * @group car-unavailability
     *
     * @return void
     */
    public function theAddDatePostDataSaves()
    {
        $this->actingAs($this->admin);

        $car = $this->createCar();

        Livewire::test(Unavailability::class, ['car' => $car->hashid])
            ->set('start_date', '25-11-2022')
            ->set('end_date', '27-11-2022')
            ->call('addDate')
            ->assertStatus(200);

        $unavailable = CarUnavailable::first();

        $this->assertEquals("25-11-2022", $unavailable->start_date->format('d-m-Y'));
        $this->assertEquals("27-11-2022", $unavailable->end_date->format('d-m-Y'));
        $this->assertEquals($car->id, $unavailable->car_id);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group car
     * @group car-unavailability
     *
     * @return void
     */
    public function theEditDatePostDataFails()
    {
        $this->actingAs($this->admin);

        $car = $this->createCar();
        $car->unavailableDates()->create([
            'start_date'    => Carbon::createFromFormat("d-m-Y", "25-11-2022"),
            'end_date'      => Carbon::createFromFormat("d-m-Y", "27-11-2022"),
        ]);

        $dates = [
            [
                'id' => 1,
                'start_date' => null,
                'end_date' => null,
            ]
        ];

        Livewire::test(Unavailability::class, ['car' => $car->hashid])
            ->set('dates', $dates)
            ->call('editDate', 0)
            ->assertHasErrors([
                'dates.0.start_date' => ['required'],
                'dates.0.end_date' => ['required'],
            ]);

        $dates = [
            [
                'id' => 1,
                'start_date' => 'chichipapa',
                'end_date' => ['what' => 'the fuck'],
            ]
        ];

        Livewire::test(Unavailability::class, ['car' => $car->hashid])
            ->set('dates', $dates)
            ->call('editDate', 0)
            ->assertHasErrors([
                'dates.0.start_date' => ['date'],
                'dates.0.end_date' => ['date'],
            ]);

        $dates = [
            [
                'id' => 1,
                'start_date' => '25-11-2022',
                'end_date' => '23-11-2022',
            ]
        ];

        Livewire::test(Unavailability::class, ['car' => $car->hashid])
            ->set('dates', $dates)
            ->call('editDate', 0)
            ->assertHasErrors([
                'dates.0.end_date' => ['after'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group car
     * @group car-unavailability
     *
     * @return void
     */
    public function theEditDatePostDataSaves()
    {
        $this->actingAs($this->admin);

        $car = $this->createCar();
        $car->unavailableDates()->create([
            'start_date'    => Carbon::createFromFormat("d-m-Y", "1-11-2022"),
            'end_date'      => Carbon::createFromFormat("d-m-Y", "15-11-2022"),
        ]);

        $dates = [
            [
                'id' => 1,
                'start_date' => '25-11-2022',
                'end_date' => '27-11-2022',
            ]
        ];

        Livewire::test(Unavailability::class, ['car' => $car->hashid])
            ->set('dates', $dates)
            ->call('editDate', 0)
            ->assertStatus(200);

        $unavailable = CarUnavailable::first();

        $this->assertEquals("25-11-2022", $unavailable->start_date->format('d-m-Y'));
        $this->assertEquals("27-11-2022", $unavailable->end_date->format('d-m-Y'));
        $this->assertEquals($car->id, $unavailable->car_id);
    }

     /**
     * @test
     * @group feature
     * @group admin
     * @group car
     * @group car-unavailability
     *
     * @return void
     */
    public function deleteRequestSuccessfullyDeletesDate()
    {
        $this->actingAs($this->admin);

        $car = $this->createCar();

        $car->unavailableDates()->create([
            'start_date'    => Carbon::createFromFormat("d-m-Y", "1-11-2022"),
            'end_date'      => Carbon::createFromFormat("d-m-Y", "15-11-2022"),
        ]);

        // The date should be in the array
        Livewire::test(Unavailability::class, ['car' => $car->hashid])
            ->assertSet('dates', [
                [
                    'id' => 1,
                    'start_date' => '01-11-2022',
                    'end_date' => '15-11-2022',
                ]
            ]);

        // Delete date
        Livewire::test(Unavailability::class, ['car' => $car->hashid])
            ->call('deleteDate', 0)
            ->assertStatus(200);

        // The date should not be in the array
        Livewire::test(Unavailability::class, ['car' => $car->hashid])
            ->assertSet('dates', []);
    }
}
