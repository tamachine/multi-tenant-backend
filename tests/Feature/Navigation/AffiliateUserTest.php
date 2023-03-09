<?php

namespace Tests\Feature\Navigation;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AffiliateUserTest extends TestCase
{
    use RefreshDatabase;

    protected $developer;
    protected $superAdmin;
    protected $admin;
    protected $bookingAgent;
    protected $contentUser;
    protected $affiliateUser;
    protected $affiliate;

    public function setUp(): void
    {
        parent::setUp();
        $this->developer = $this->createDeveloper();
        $this->superAdmin = $this->createSuperAdmin();
        $this->admin = $this->createAdmin();
        $this->bookingAgent = $this->createBookingAgent();
        $this->contentUser = $this->createContentUser();
        $this->affiliateUser = $this->createAffiliateUser();
        $this->affiliate = $this->createAffiliate(['user_id' => $this->affiliateUser->id]);
    }

    /**
     * @test
     * @group feature
     * @group navigation
     * @group navigation-affiliate-user
     *
     * @return void
     */
    public function theGeneralDashboardDoesNotLoad()
    {
        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.dashboard'))
            ->assertStatus(403);
    }

    /**
     * @test
     * @group feature
     * @group navigation
     * @group navigation-affiliate-user
     *
     * @return void
     */
    public function theAffiliateUserDashboardLoads()
    {
        $this->get(route('intranet.affiliate.dashboard'))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('intranet.affiliate.dashboard'))
            ->assertStatus(403);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.affiliate.dashboard'))
            ->assertStatus(403);

        $this->actingAs($this->admin)
            ->get(route('intranet.affiliate.dashboard'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.affiliate.dashboard'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.affiliate.dashboard'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.affiliate.dashboard'))
            ->assertStatus(200);
    }
}
