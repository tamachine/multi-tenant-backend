<?php

namespace Tests\Feature\Navigation;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
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
     * @group navigation-admin
     *
     * @return void
     */
    public function theGeneralDashboardLoads()
    {
        $this->actingAs($this->admin)
            ->get(route('intranet.dashboard'))
            ->assertStatus(200);
    }

    /**
     * @test
     * @group feature
     * @group navigation
     * @group navigation-admin
     *
     * @return void
     */
    public function theSettingsDashboardLoads()
    {
        $this->get(route('intranet.settings'))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('intranet.settings'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.settings'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.settings'))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.settings'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.settings'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.settings'))
            ->assertStatus(403);
    }

    /**
     * @test
     * @group feature
     * @group navigation
     * @group navigation-admin
     * @group vendor
     *
     * @return void
     */
    public function theVendorPagesLoad()
    {
        $vendor = $this->createVendor();

        $this->get(route('intranet.vendor.index'))
            ->assertRedirect('login');

        $this->get(route('intranet.vendor.create'))
            ->assertRedirect('login');

        $this->get(route('intranet.vendor.edit', $vendor->hashid))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('intranet.vendor.index'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('intranet.vendor.create'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('intranet.vendor.edit', $vendor->hashid))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.vendor.index'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.vendor.create'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.vendor.edit', $vendor->hashid))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.vendor.index'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.vendor.create'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.vendor.edit', $vendor->hashid))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.vendor.index'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.vendor.create'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.vendor.edit', $vendor->hashid))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.vendor.index'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.vendor.create'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.vendor.edit', $vendor->hashid))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.vendor.index'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.vendor.create'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.vendor.edit', $vendor->hashid))
            ->assertStatus(403);
    }

    /**
     * @test
     * @group feature
     * @group navigation
     * @group navigation-admin
     * @group location
     *
     * @return void
     */
    public function theLocationPagesLoad()
    {
        $location = $this->createLocation();

        $this->get(route('intranet.location.index'))
            ->assertRedirect('login');

        $this->get(route('intranet.location.create'))
            ->assertRedirect('login');

        $this->get(route('intranet.location.edit', $location->hashid))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('intranet.location.index'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('intranet.location.create'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('intranet.location.edit', $location->hashid))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.location.index'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.location.create'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.location.edit', $location->hashid))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.location.index'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.location.create'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.location.edit', $location->hashid))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.location.index'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.location.create'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.location.edit', $location->hashid))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.location.index'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.location.create'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.location.edit', $location->hashid))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.location.index'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.location.create'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.location.edit', $location->hashid))
            ->assertStatus(403);
    }

    /**
     * @test
     * @group feature
     * @group navigation
     * @group navigation-admin
     * @group car
     *
     * @return void
     */
    public function theCarPagesLoad()
    {
        $vendor = $this->createVendor();
        $car = $this->createCar();

        $this->get(route('intranet.car.index'))
            ->assertRedirect('login');

        $this->get(route('intranet.car.create'))
            ->assertRedirect('login');

        $this->get(route('intranet.car.edit', $car->hashid))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('intranet.car.index'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('intranet.car.create'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('intranet.car.edit', $car->hashid))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.car.index'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.car.create'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.car.edit', $car->hashid))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.car.index'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.car.create'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.car.edit', $car->hashid))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.car.index'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.car.create'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.car.edit', $car->hashid))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.car.index'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.car.create'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.car.edit', $car->hashid))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.car.index'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.car.create'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.car.edit', $car->hashid))
            ->assertStatus(403);
    }

    /**
     * @test
     * @group feature
     * @group navigation
     * @group navigation-admin
     * @group extra
     *
     * @return void
     */
    public function theExtraPagesLoad()
    {
        $vendor = $this->createVendor();
        $extra = $this->createExtra();

        $this->get(route('intranet.extra.index'))
            ->assertRedirect('login');

        $this->get(route('intranet.extra.create'))
            ->assertRedirect('login');

        $this->get(route('intranet.extra.edit', $extra->hashid))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('intranet.extra.index'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('intranet.extra.create'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('intranet.extra.edit', $extra->hashid))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.extra.index'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.extra.create'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.extra.edit', $extra->hashid))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.extra.index'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.extra.create'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.extra.edit', $extra->hashid))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.extra.index'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.extra.create'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.extra.edit', $extra->hashid))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.extra.index'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.extra.create'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.extra.edit', $extra->hashid))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.extra.index'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.extra.create'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.extra.edit', $extra->hashid))
            ->assertStatus(403);
    }

    /**
     * @test
     * @group feature
     * @group navigation
     * @group navigation-admin
     * @group season
     *
     * @return void
     */
    public function theSeasonPagesLoad()
    {
        $this->get(route('intranet.season.index'))
            ->assertRedirect('login');

        $this->get(route('intranet.season.create'))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('intranet.season.index'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('intranet.season.create'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.season.index'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.season.create'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.season.index'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.season.create'))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.season.index'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.season.create'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.season.index'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.season.create'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.season.index'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.season.create'))
            ->assertStatus(403);
    }

    /**
     * @test
     * @group feature
     * @group navigation
     * @group navigation-admin
     * @group free-day
     *
     * @return void
     */
    public function theFreeDayPagesLoad()
    {
        $this->get(route('intranet.free-day.index'))
            ->assertRedirect('login');

        $this->get(route('intranet.free-day.create'))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('intranet.free-day.index'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('intranet.free-day.create'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.free-day.index'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.free-day.create'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.free-day.index'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.free-day.create'))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.free-day.index'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.free-day.create'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.free-day.index'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.free-day.create'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.free-day.index'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.free-day.create'))
            ->assertStatus(403);
    }

    /**
     * @test
     * @group feature
     * @group navigation
     * @group navigation-admin
     *
     * @return void
     */
    public function theStatisticsPageLoads()
    {
        $this->get(route('intranet.statistics.index'))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('intranet.statistics.index'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('intranet.statistics.index'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('intranet.statistics.index'))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('intranet.statistics.index'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('intranet.statistics.index'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('intranet.statistics.index'))
            ->assertStatus(403);
    }
}
