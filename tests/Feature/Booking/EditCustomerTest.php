<?php

namespace Tests\Feature\Booking;

use App\Http\Livewire\Booking\Customer;
use App\Models\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class EditCustomerTest extends TestCase
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
     * @group booking-customer
     *
     * @return void
     */
    public function editCustomerValidatesInput()
    {
        $this->actingAs($this->bookingAgent);

        $booking = $this->createBooking();

        Livewire::test(Customer::class, ['booking' => $booking->hashid])
            ->set('first_name', null)
            ->set('last_name', null)
            ->set('email', null)
            ->call('saveCustomer')
            ->assertHasErrors([
                'first_name' => ['required'],
                'last_name' => ['required'],
                'email' => ['required'],
            ]);

        Livewire::test(Customer::class, ['booking' => $booking->hashid])
            ->set('email', 'chichipapa')
            ->call('saveCustomer')
            ->assertHasErrors([
                'email' => ['email'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group booking
     * @group booking-customer
     *
     * @return void
     */
    public function editCustomerPostDataSaves()
    {
        $this->actingAs($this->bookingAgent);

        $booking = $this->createBooking();

        Livewire::test(Customer::class, ['booking' => $booking])
            ->set('first_name', 'Gregorio')
            ->set('last_name', 'Sánchez')
            ->set('email', 'chiquito@delacalzada.com')
            ->set('telephone', '+34 666222555')
            ->set('address', 'Pradera 25')
            ->set('postal_code', '12345')
            ->set('city', 'Barbate')
            ->set('state', 'Jarl')
            ->set('country', 'Chiquitistán')

            ->set('driver_name', 'Gregorio Sánchez')
            ->set('driver_date_birth', '28/05/1932')
            ->set('driver_id_passport', 'XXXXXXXX')
            ->set('driver_license_number', 'YYYYYYYYY')
            ->set('extra_driver_info1', 'Grijando More')
            ->set('extra_driver_info2', 'Lago Blanco')
            ->set('extra_driver_info3', 'Lago Negro')
            ->set('extra_driver_info4', 'Fistro de la Pradera')
            ->set('weight_info', 'Lago Blanco - 5kg, Lago Negro - 7kg')

            ->set('number_passengers', '7')
            ->set('pickup_input_info', 'Antes de los Dolores')
            ->set('dropoff_input_info', 'Después de los Dolores')
            ->set('newsletter', 1)
            ->call('saveCustomer')
            ->assertStatus(200);

        $booking = Booking::first();

        $this->assertEquals('Gregorio', $booking->first_name);
        $this->assertEquals('Sánchez', $booking->last_name);
        $this->assertEquals('chiquito@delacalzada.com', $booking->email);
        $this->assertEquals('+34 666222555', $booking->telephone);
        $this->assertEquals('Pradera 25', $booking->address);
        $this->assertEquals('12345', $booking->postal_code);
        $this->assertEquals('Barbate', $booking->city);
        $this->assertEquals('Jarl', $booking->state);
        $this->assertEquals('Chiquitistán', $booking->country);

        $this->assertEquals('Gregorio Sánchez', $booking->driver_name);
        $this->assertEquals('28/05/1932', $booking->driver_date_birth);
        $this->assertEquals('XXXXXXXX', $booking->driver_id_passport);
        $this->assertEquals('YYYYYYYYY', $booking->driver_license_number);
        $this->assertEquals('Grijando More', $booking->extra_driver_info1);
        $this->assertEquals('Lago Blanco', $booking->extra_driver_info2);
        $this->assertEquals('Lago Negro', $booking->extra_driver_info3);
        $this->assertEquals('Fistro de la Pradera', $booking->extra_driver_info4);
        $this->assertEquals('Lago Blanco - 5kg, Lago Negro - 7kg', $booking->weight_info);

        $this->assertEquals(7, $booking->number_passengers);
        $this->assertEquals('Antes de los Dolores', $booking->pickup_input_info);
        $this->assertEquals('Después de los Dolores', $booking->dropoff_input_info);
        $this->assertEquals(1, $booking->newsletter);
    }
}
