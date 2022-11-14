<?php

namespace Tests\Feature\Admin\Vendor;

use App\Http\Livewire\Admin\Vendor\EarlyBird;
use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class EarlyBirdTest extends TestCase
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
     * @group vendor-early-bird
     *
     * @return void
     */
    public function theVendorEarlyBirdPostDataFails()
    {
        $this->actingAs($this->admin);

        $early_bird = [
            1 => "fistro",
            2 => -15,
            3 => 200,
        ];

        Livewire::test(EarlyBird::class, ['vendor' => $this->vendor->hashid])
            ->set('early_bird', $early_bird)
            ->call('saveEarlyBird')
            ->assertHasErrors([
                'early_bird.1' => ['numeric'],
                'early_bird.2' => ['gte'],
                'early_bird.3' => ['lt'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group vendor
     * @group vendor-early-bird
     *
     * @return void
     */
    public function theVendorEarlyBirdPostDataSaves()
    {
        $this->actingAs($this->admin);

        $early_bird = [
            1 => 0,
            2 => 10,
            3 => 20,
        ];

        Livewire::test(EarlyBird::class, ['vendor' => $this->vendor->hashid])
            ->set('early_bird', $early_bird)
            ->call('saveEarlyBird')
            ->assertStatus(200);

        $vendor = Vendor::find(1);
        $this->assertEquals([
            1 => 0,
            2 => 10,
            3 => 20,
        ], $vendor->early_bird);
    }
}
