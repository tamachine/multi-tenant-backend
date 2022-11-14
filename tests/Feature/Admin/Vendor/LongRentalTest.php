<?php

namespace Tests\Feature\Admin\Vendor;

use App\Http\Livewire\Admin\Vendor\LongRental;
use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class LongRentalTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->admin = $this->createUser();
        $this->vendor = $this->createVendor();
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group vendor
     * @group vendor-long-rental
     *
     * @return void
     */
    public function theVendorLongRentalPostDataFails()
    {
        $this->actingAs($this->admin);

        $long_rental = [
            1 => "fistro",
            2 => -15,
            3 => 200,
        ];

        Livewire::test(LongRental::class, ['vendor' => $this->vendor->hashid])
            ->set('long_rental', $long_rental)
            ->call('saveLongRental')
            ->assertHasErrors([
                'long_rental.1' => ['numeric'],
                'long_rental.2' => ['gte'],
                'long_rental.3' => ['lt'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group vendor
     * @group vendor-long-rental
     *
     * @return void
     */
    public function theVendorLongRentalPostDataSaves()
    {
        $this->actingAs($this->admin);

        $long_rental = [
            1 => 0,
            2 => 10,
            3 => 20,
        ];

        Livewire::test(LongRental::class, ['vendor' => $this->vendor->hashid])
            ->set('long_rental', $long_rental)
            ->call('saveLongRental')
            ->assertStatus(200);

        $vendor = Vendor::find(1);
        $this->assertEquals([
            1 => 0,
            2 => 10,
            3 => 20,
        ], $vendor->long_rental);
    }
}
