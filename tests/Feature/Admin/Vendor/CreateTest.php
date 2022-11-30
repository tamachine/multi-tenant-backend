<?php

namespace Tests\Feature\Admin\Vendor;

use App\Http\Livewire\Admin\Vendor\Create;
use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->admin = $this->createUser();
        $this->caren_vendor = $this->createCarenVendor();
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group vendor
     * @group vendor-create
     *
     * @return void
     */
    public function createVendorValidatesInput()
    {
        $this->actingAs($this->admin);

        Livewire::test(Create::class, ['caren_vendor' => $this->caren_vendor->id])
            ->set('service_fee', null)
            ->set('status', null)
            ->set('brand_color', null)
            ->call('saveVendor')
            ->assertHasErrors([
                'name' => ['required'],
                'vendor_code' => ['required'],
                'service_fee' => ['required'],
                'status' => ['required'],
                'brand_color' => ['required'],
            ]);

        Livewire::test(Create::class, ['caren_vendor' => $this->caren_vendor->id])
            ->set('service_fee', "fistro")
            ->call('saveVendor')
            ->assertHasErrors([
                'service_fee' => ['numeric'],
            ]);

        Livewire::test(Create::class, ['caren_vendor' => $this->caren_vendor->id])
            ->set('service_fee', -500)
            ->call('saveVendor')
            ->assertHasErrors([
                'service_fee' => ['gte'],
            ]);

        $vendor = $this->createVendor();

        Livewire::test(Create::class, ['caren_vendor' => $this->caren_vendor->id])
            ->set('name', $vendor->name)
            ->set('vendor_code', $vendor->vendor_code)
            ->call('saveVendor')
            ->assertHasErrors([
                'name' => ['unique'],
                'vendor_code' => ['unique'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group vendor
     * @group vendor-create
     *
     * @return void
     */
    public function createVendorPostDataSaves()
    {
        $this->actingAs($this->admin);

        Livewire::test(Create::class, ['caren_vendor' => $this->caren_vendor->id])
            ->set('name', "Vendor 1")
            ->set('vendor_code', "V1")
            ->set('service_fee', 250)
            ->set('status', 'active')
            ->set('brand_color', '#FFFFFF')
            ->set('caren_vendor', $this->caren_vendor->id)
            ->call('saveVendor')
            ->assertStatus(200);

        $vendor = Vendor::first();

        $this->assertEquals("Vendor 1", $vendor->name);
        $this->assertEquals("V1", $vendor->vendor_code);
        $this->assertEquals(250, $vendor->service_fee);
        $this->assertEquals('active', $vendor->status);
        $this->assertEquals('#FFFFFF', $vendor->brand_color);
    }
}
