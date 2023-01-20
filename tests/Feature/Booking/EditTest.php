<?php

namespace Tests\Feature\Booking;

use App\Http\Livewire\Booking\Edit;
use App\Models\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class EditTest extends TestCase
{
    use RefreshDatabase;

    protected $bookingAgent;
    protected $vendor;
    protected $location;
    protected $car;

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
     * @group booking-edit
     *
     * @return void
     */
    public function editBookingValidatesInput()
    {
        $this->actingAs($this->bookingAgent);

        $booking = $this->createBooking();

        Livewire::test(Edit::class, ['booking' => $booking->hashid])
            ->set('car', null)
            ->set('pickup_location', null)
            ->set('dropoff_location', null)
            ->set('pickup_date', null)
            ->set('dropoff_date', null)
            ->call('editBooking')
            ->assertHasErrors([
                'car' => ['required'],
                'pickup_location' => ['required'],
                'dropoff_location' => ['required'],
                'pickup_date' => ['required'],
                'dropoff_date' => ['required'],
            ]);

        Livewire::test(Edit::class, ['booking' => $booking->hashid])
            ->set('pickup_date', 'zapato')
            ->set('dropoff_date', 66)
            ->call('editBooking')
            ->assertHasErrors([
                'pickup_date' => ['date'],
                'dropoff_date' => ['date'],
            ]);

        Livewire::test(Edit::class, ['booking' => $booking->hashid])
            ->set('pickup_date', '14-03-2025')
            ->set('dropoff_date', '11-01-2025')
            ->call('editBooking')
            ->assertHasErrors([
                'dropoff_date' => ['after'],
            ]);

        Livewire::test(Edit::class, ['booking' => $booking->hashid])
            ->set('total_price', 100000)
            ->set('online_payment', 200000)
            ->call('editBooking')
            ->assertHasErrors([
                'online_payment' => ['lte'],
            ]);

        Livewire::test(Edit::class, ['booking' => $booking->hashid])
            ->set('status', 'canceled')
            ->set('cancel_reason', null)
            ->call('editBooking')
            ->assertHasErrors([
                'cancel_reason' => ['required_if'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group booking
     * @group booking-edit
     *
     * @return void
     */
    public function editBookingPostDataSaves()
    {
        $this->actingAs($this->bookingAgent);

        $booking = $this->createBooking();

        Livewire::test(Edit::class, ['booking' => $booking])
            ->set('car', $this->car->hashid)
            ->set('pickup_location', $this->location->hashid)
            ->set('dropoff_location', $this->location->hashid)
            ->set('pickup_date', '14-03-2025')
            ->set('pickup_hour', '09:00')
            ->set('dropoff_date', '21-03-2025')
            ->set('dropoff_hour', '16:00')
            ->set('payment_status', 'confirmed')
            ->set('vendor_status', 'confirmed')
            ->set('status', 'confirmed')
            ->call('editBooking')
            ->assertStatus(200);

        $booking = Booking::first();

        $this->assertEquals($this->vendor->name, $booking->vendor_name);
        $this->assertEquals($this->car->name, $booking->car_name);
        $this->assertEquals($this->location->name, $booking->pickup_name);
        $this->assertEquals($this->location->name, $booking->dropoff_name);
        $this->assertEquals('14-03-2025 09:00', $booking->pickup_at->format('d-m-Y H:i'));
        $this->assertEquals('21-03-2025 16:00', $booking->dropoff_at->format('d-m-Y H:i'));
        $this->assertEquals('confirmed', $booking->payment_status);
        $this->assertEquals('confirmed', $booking->vendor_status);
        $this->assertEquals('confirmed', $booking->status);
    }
}
