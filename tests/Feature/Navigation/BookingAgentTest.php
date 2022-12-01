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

    public function setUp(): void
    {
        parent::setUp();
        $this->developer = $this->createDeveloper();
        $this->superAdmin = $this->createSuperAdmin();
        $this->admin = $this->createAdmin();
        $this->bookingAgent = $this->createBookingAgent();
        $this->contentUser = $this->createContentUser();
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
            ->get(route('dashboard'))
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
        $this->get(route('bookings'))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('bookings'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('bookings'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('bookings'))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('bookings'))
            ->assertStatus(200);

        $this->actingAs($this->contentUser)
            ->get(route('settings'))
            ->assertStatus(403);
    }
}
