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
            ->get(route('dashboard'))
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
        $this->get(route('settings'))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('settings'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('settings'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('settings'))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('settings'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('settings'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('settings'))
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

        $this->get(route('vendor.index'))
            ->assertRedirect('login');

        $this->get(route('vendor.create'))
            ->assertRedirect('login');

        $this->get(route('vendor.edit', $vendor->hashid))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('vendor.index'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('vendor.create'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('vendor.edit', $vendor->hashid))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('vendor.index'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('vendor.create'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('vendor.edit', $vendor->hashid))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('vendor.index'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('vendor.create'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('vendor.edit', $vendor->hashid))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('vendor.index'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('vendor.create'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('vendor.edit', $vendor->hashid))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('vendor.index'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('vendor.create'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('vendor.edit', $vendor->hashid))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('vendor.index'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('vendor.create'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('vendor.edit', $vendor->hashid))
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

        $this->get(route('location.index'))
            ->assertRedirect('login');

        $this->get(route('location.create'))
            ->assertRedirect('login');

        $this->get(route('location.edit', $location->hashid))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('location.index'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('location.create'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('location.edit', $location->hashid))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('location.index'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('location.create'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('location.edit', $location->hashid))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('location.index'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('location.create'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('location.edit', $location->hashid))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('location.index'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('location.create'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('location.edit', $location->hashid))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('location.index'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('location.create'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('location.edit', $location->hashid))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('location.index'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('location.create'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('location.edit', $location->hashid))
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

        $this->get(route('car.index'))
            ->assertRedirect('login');

        $this->get(route('car.create'))
            ->assertRedirect('login');

        $this->get(route('car.edit', $car->hashid))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('car.index'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('car.create'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('car.edit', $car->hashid))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('car.index'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('car.create'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('car.edit', $car->hashid))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('car.index'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('car.create'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('car.edit', $car->hashid))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('car.index'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('car.create'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('car.edit', $car->hashid))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('car.index'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('car.create'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('car.edit', $car->hashid))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('car.index'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('car.create'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('car.edit', $car->hashid))
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

        $this->get(route('extra.index'))
            ->assertRedirect('login');

        $this->get(route('extra.create'))
            ->assertRedirect('login');

        $this->get(route('extra.edit', $extra->hashid))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('extra.index'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('extra.create'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('extra.edit', $extra->hashid))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('extra.index'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('extra.create'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('extra.edit', $extra->hashid))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('extra.index'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('extra.create'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('extra.edit', $extra->hashid))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('extra.index'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('extra.create'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('extra.edit', $extra->hashid))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('extra.index'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('extra.create'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('extra.edit', $extra->hashid))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('extra.index'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('extra.create'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('extra.edit', $extra->hashid))
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
        $this->get(route('season.index'))
            ->assertRedirect('login');

        $this->get(route('season.create'))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('season.index'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('season.create'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('season.index'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('season.create'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('season.index'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('season.create'))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('season.index'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('season.create'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('season.index'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('season.create'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('season.index'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('season.create'))
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
        $this->get(route('free-day.index'))
            ->assertRedirect('login');

        $this->get(route('free-day.create'))
            ->assertRedirect('login');

        $this->actingAs($this->developer)
            ->get(route('free-day.index'))
            ->assertStatus(200);

        $this->actingAs($this->developer)
            ->get(route('free-day.create'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('free-day.index'))
            ->assertStatus(200);

        $this->actingAs($this->superAdmin)
            ->get(route('free-day.create'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('free-day.index'))
            ->assertStatus(200);

        $this->actingAs($this->admin)
            ->get(route('free-day.create'))
            ->assertStatus(200);

        $this->actingAs($this->bookingAgent)
            ->get(route('free-day.index'))
            ->assertStatus(403);

        $this->actingAs($this->bookingAgent)
            ->get(route('free-day.create'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('free-day.index'))
            ->assertStatus(403);

        $this->actingAs($this->contentUser)
            ->get(route('free-day.create'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('free-day.index'))
            ->assertStatus(403);

        $this->actingAs($this->affiliateUser)
            ->get(route('free-day.create'))
            ->assertStatus(403);
    }
}
