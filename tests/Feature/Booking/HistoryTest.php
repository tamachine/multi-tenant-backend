<?php

namespace Tests\Feature\Booking;

use App\Http\Livewire\Booking\History;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class HistoryTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->bookingAgent = $this->createBookingAgent();
        $this->vendor1 = $this->createVendor();
        $this->vendor2 = $this->createVendor();
        $this->location = $this->createLocation();
        $this->car1 = $this->createCar(['vendor_id' => $this->vendor1->id, 'car_code' => "CAR1"]);
        $this->car2 = $this->createCar(['vendor_id' => $this->vendor1->id, 'car_code' => "CAR2"]);
        $this->car3 = $this->createCar(['vendor_id' => $this->vendor2->id, 'car_code' => "CAR3"]);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group booking
     * @group booking-index
     *
     * @return void
     */
    public function bookingIndexShowsCarsAndFilters()
    {
        $this->actingAs($this->bookingAgent);

        $booking1 = $this->createBooking(['car_id' => $this->car1->id, 'vendor_id' => $this->vendor1->id]);
        $booking2 = $this->createBooking(['car_id' => $this->car2->id, 'vendor_id' => $this->vendor1->id]);
        $booking3 = $this->createBooking(['car_id' => $this->car3->id, 'vendor_id' => $this->vendor2->id]);

        Livewire::test(History::class)
            ->assertSee($booking1->order_id)
            ->assertSee($booking2->order_id)
            ->assertSee($booking3->order_id);

        Livewire::test(History::class)
            ->set('order_id', $booking1->order_id)
            ->assertSee($booking1->order_id)
            ->assertDontSee($booking2->order_id)
            ->assertDontSee($booking3->order_id);

        Livewire::test(History::class)
            ->set('order_id', $booking2->order_id)
            ->assertSee($booking2->order_id)
            ->assertDontSee($booking1->order_id)
            ->assertDontSee($booking3->order_id);

        Livewire::test(History::class)
            ->set('order_id', $booking3->order_id)
            ->assertSee($booking3->order_id)
            ->assertDontSee($booking1->order_id)
            ->assertDontSee($booking2->order_id);

        Livewire::test(History::class)
            ->set('vendor', $this->vendor1->hashid)
            ->assertSee($booking1->order_id)
            ->assertSee($booking2->order_id)
            ->assertDontSee($booking3->order_id);

        Livewire::test(History::class)
            ->set('vendor', $this->vendor2->hashid)
            ->assertDontSee($booking1->order_id)
            ->assertDontSee($booking2->order_id)
            ->assertSee($booking3->order_id);
    }
}
