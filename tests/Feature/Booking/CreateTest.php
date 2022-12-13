<?php

namespace Tests\Feature\Booking;

use App\Http\Livewire\Booking\Create;
use App\Models\Booking;
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
        $this->bookingAgent = $this->createBookingAgent();
        $this->vendor = $this->createVendor();
        $this->location = $this->createLocation();
        $this->car = $this->createCar();
    }

    /**
     * @test
     * @group feature
     * @group booking
     * @group booking-create
     *
     * @return void
     */
    public function createBookingValidatesInput()
    {
        $this->actingAs($this->bookingAgent);

        Livewire::test(Create::class)
            ->set('vendor', null)
            ->set('car', null)
            ->set('pickup_location', null)
            ->set('dropoff_location', null)
            ->set('pickup_date', null)
            ->set('dropoff_date', null)
            ->call('saveBooking')
            ->assertHasErrors([
                'vendor' => ['required'],
                'car' => ['required'],
                'pickup_location' => ['required'],
                'dropoff_location' => ['required'],
                'pickup_date' => ['required'],
                'dropoff_date' => ['required'],
            ]);

        Livewire::test(Create::class)
            ->set('pickup_date', 'zapato')
            ->set('dropoff_date', 66)
            ->call('saveBooking')
            ->assertHasErrors([
                'pickup_date' => ['date'],
                'dropoff_date' => ['date'],
            ]);

        Livewire::test(Create::class)
            ->set('pickup_date', '14-03-2025')
            ->set('dropoff_date', '11-01-2025')
            ->call('saveBooking')
            ->assertHasErrors([
                'dropoff_date' => ['after'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group booking
     * @group booking-create
     *
     * @return void
     */
    public function createBookingPostDataSaves()
    {
        $this->actingAs($this->bookingAgent);

        Livewire::test(Create::class)
            ->set('vendor', $this->vendor->hashid)
            ->set('car', $this->car->hashid)
            ->set('pickup_location', $this->location->hashid)
            ->set('dropoff_location', $this->location->hashid)
            ->set('pickup_date', '14-03-2025')
            ->set('pickup_hour', '09:00')
            ->set('dropoff_date', '21-03-2025')
            ->set('dropoff_hour', '16:00')
            ->call('saveBooking')
            ->assertStatus(200);

        $booking = Booking::first();

        $this->assertEquals($this->vendor->name, $booking->vendor_name);
        $this->assertEquals($this->car->name, $booking->car_name);
        $this->assertEquals($this->location->name, $booking->pickup_name);
        $this->assertEquals($this->location->name, $booking->dropoff_name);
        $this->assertEquals('14-03-2025 09:00', $booking->pickup_at->format('d-m-Y H:i'));
        $this->assertEquals('21-03-2025 16:00', $booking->dropoff_at->format('d-m-Y H:i'));
    }
}
