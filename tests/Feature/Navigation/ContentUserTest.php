<?php

namespace Tests\Feature\Navigation;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContentUserTest extends TestCase
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
     * @group navigation-content-user
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
     * @group navigation-content-user
     *
     * @return void
     */
    public function theContentUserDashboardLoads()
    {
        $this->get(route('intranet.content.dashboard'))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('intranet.content.dashboard'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.content.dashboard'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.content.dashboard'))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.content.dashboard'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.content.dashboard'))
            ->assertStatus(200);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.content.dashboard'))
            ->assertStatus(403);
    }
}
