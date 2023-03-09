<?php

namespace Tests\Feature\Navigation;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingAgentTest extends TestCase
{
    use RefreshDatabase;

    protected $developer;
    protected $superAdmin;
    protected $admin;
    protected $bookingAgent;
    protected $contentUser;
    protected $affiliateUser;

    public function setUp(): void
    {
        parent::setUp();
        $this->developer = $this->createDeveloper();
        $this->superAdmin = $this->createSuperAdmin();
        $this->admin = $this->createAdmin();
        $this->bookingAgent = $this->createBookingAgent();
        $this->contentUser = $this->createContentUser();
        $this->affiliateUser = $this->createAffiliateUser();
    }

    /**
     * @test
     * @group feature
     * @group navigation
     * @group navigation-booking-agent
     *
     * @return void
     */
    public function theGeneralDashboardLoads()
    {
        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.dashboard'))
            ->assertStatus(200);
    }

    /**
     * @test
     * @group feature
     * @group navigation
     * @group navigation-booking-agent
     *
     * @return void
     */
    public function theBookingAgentDashboardLoads()
    {
        $this->get(route('intranet.booking.dashboard'))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('intranet.booking.dashboard'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.booking.dashboard'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.booking.dashboard'))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.booking.dashboard'))
            ->assertStatus(200);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.booking.dashboard'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.booking.dashboard'))
            ->assertStatus(403);
    }

    /**
     * @test
     * @group feature
     * @group navigation
     * @group navigation-booking-agent
     *
     * @return void
     */
    public function theBookingHistoryLoads()
    {
        $this->get(route('intranet.booking.history'))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('intranet.booking.history'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.booking.history'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.booking.history'))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.booking.history'))
            ->assertStatus(200);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.booking.history'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.booking.history'))
            ->assertStatus(403);
    }

    /**
     * @test
     * @group feature
     * @group navigation
     * @group navigation-booking-agent
     *
     * @return void
     */
    public function theBookingPagesLoad()
    {
        $vendor = $this->createVendor();
        $location = $this->createLocation();
        $car = $this->createCar();
        $booking = $this->createBooking();

        $this->get(route('intranet.booking.create'))
            ->assertRedirect('login');

        $this->get(route('intranet.booking.edit', $booking->hashid))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('intranet.booking.create'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('intranet.booking.edit', $booking->hashid))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.booking.create'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.booking.edit', $booking->hashid))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.booking.create'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.booking.edit', $booking->hashid))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.booking.create'))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.booking.edit', $booking->hashid))
            ->assertStatus(200);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.booking.create'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.booking.edit', $booking->hashid))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.booking.create'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.booking.edit', $booking->hashid))
            ->assertStatus(403);
    }
}
