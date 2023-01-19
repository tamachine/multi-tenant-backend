<?php

namespace Tests\Feature\Booking\Affiliate;

use App\Http\Livewire\Booking\Affiliate\Edit;
use App\Http\Livewire\Booking\Affiliate\Index;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    use RefreshDatabase;

    protected $bookingAgent;

    public function setUp(): void
    {
        parent::setUp();
        $this->bookingAgent = $this->createBookingAgent();
    }

    /**
     * @test
     * @group feature
     * @group booking
     * @group affiliate
     * @group affiliate-delete
     *
     * @return void
     */
    public function deleteRequestSuccessfullyDeletesCar()
    {
        $this->actingAs($this->bookingAgent);

        $user = $this->createUser(['role' => 'affiliate']);
        $affiliate = $this->createAffiliate(['user_id' => $user->id]);

        // We should see the affiliate
        Livewire::test(Index::class)
            ->assertSee($affiliate->name);

        // Delete
        Livewire::test(Edit::class, ['affiliate' => $affiliate])
            ->call('deleteAffiliate', $affiliate->hashid)
            ->assertRedirect(route('booking.affiliate.index'));

        // We should not see the affiliate
        Livewire::test(Index::class)
            ->assertDontSee($affiliate->name);
    }
}
