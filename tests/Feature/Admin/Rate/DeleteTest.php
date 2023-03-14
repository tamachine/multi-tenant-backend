<?php

namespace Tests\Feature\Admin\Rate;

use App\Http\Livewire\Admin\Rate\Edit;
use App\Http\Livewire\Admin\Rate\Index;
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
     * @group rate
     * @group rate-delete
     *
     * @return void
     */
    public function deleteRequestSuccessfullyDeletesRate()
    {
        $this->actingAs($this->admin);

        $rate = $this->createRate();

        // We should see the rate
        Livewire::test(Index::class)
            ->assertSee($rate->name);

        // Delete
        Livewire::test(Edit::class, ['rate' => $rate->id])
            ->call('deleteRate', $rate->id)
            ->assertRedirect(route('intranet.rate.index'));

        // We should not see the rate
        Livewire::test(Index::class)
            ->assertDontSee($rate->name);
    }
}
