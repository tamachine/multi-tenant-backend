<?php

namespace Tests\Feature\Admin\Vendor;

use App\Http\Livewire\Admin\Vendor\Edit;
use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class EditTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->admin = $this->createUser();
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group vendor
     * @group vendor-edit
     *
     * @return void
     */
    public function theEditVendorPostDataFails()
    {
        $this->actingAs($this->admin);

        $vendor = $this->createVendor();
        $vendorOther = $this->createVendor();

        Livewire::test(Edit::class, ['vendor' => $vendor->hashid])
            ->set('name', null)
            ->set('vendor_code', null)
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

        Livewire::test(Edit::class, ['vendor' => $vendor->hashid])
            ->set('service_fee', "fistro")
            ->call('saveVendor')
            ->assertHasErrors([
                'service_fee' => ['numeric'],
            ]);

        Livewire::test(Edit::class, ['vendor' => $vendor->hashid])
            ->set('service_fee', -500)
            ->call('saveVendor')
            ->assertHasErrors([
                'service_fee' => ['gte'],
            ]);

        Livewire::test(Edit::class, ['vendor' => $vendor->hashid])
            ->set('name', $vendorOther->name)
            ->set('vendor_code', $vendorOther->vendor_code)
            ->call('saveVendor')
            ->assertHasErrors([
                'name' => ['unique'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group vendor
     * @group vendor-edit
     *
     * @return void
     */
    public function theEditVendorPostDataSaves()
    {
        $this->actingAs($this->admin);

        $vendor = $this->createVendor();

        Livewire::test(Edit::class, ['vendor' => $vendor->hashid])
        ->set('name', "Vendor 1")
        ->set('vendor_code', "V1")
        ->set('service_fee', 250)
        ->set('status', 'active')
        ->set('brand_color', '#FFFFFF')
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
