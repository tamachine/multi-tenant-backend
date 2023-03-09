<?php

namespace Tests\Feature\Navigation;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SuperAdminTest extends TestCase
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
     * @group navigation-super-admin
     *
     * @return void
     */
    public function theGeneralDashboardLoads()
    {
        $this->actingAs($this->superAdmin)
            ->get(route('intranet.dashboard'))
            ->assertStatus(200);
    }

    /**
     * @test
     * @group feature
     * @group navigation
     * @group navigation-super-admin
     * @group user
     *
     * @return void
     */
    public function theIntranetUserPagesLoad()
    {
        $this->get(route('intranet.user.index'))
            ->assertRedirect('login');

        $this->get(route('intranet.user.create'))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('intranet.user.index'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('intranet.user.create'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.user.index'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.user.create'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.user.index'))
            ->assertStatus(403);

        $this->actingAs($this->admin)
            ->get(route('intranet.user.create'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.user.index'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.user.create'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.user.index'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.user.create'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.user.index'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.user.create'))
            ->assertStatus(403);
    }
}
