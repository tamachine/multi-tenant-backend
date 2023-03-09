<?php

namespace Tests\Feature\Admin\Vendor;

use App\Http\Livewire\Admin\Vendor\Edit;
use App\Http\Livewire\Admin\Vendor\Index;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class DeleteTest extends TestCase
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
     * @group vendor-delete
     *
     * @return void
     */
    public function deleteRequestSuccessfullyDeletesVendor()
    {
        $this->actingAs($this->admin);

        $vendor = $this->createVendor();

        // We should see the vendor
        Livewire::test(Index::class)
            ->assertSee($vendor->name);

        // Delete
        Livewire::test(Edit::class, ['vendor' => $vendor->hashid])
            ->call('deleteVendor', $vendor->hashid)
            ->assertRedirect(route('intranet.vendor.index'));

        // We should not see the vendor
        Livewire::test(Index::class)
            ->assertDontSee($vendor->name);
    }
}
