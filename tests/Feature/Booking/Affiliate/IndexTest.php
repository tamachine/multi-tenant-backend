<?php

namespace Tests\Feature\Booking\Affiliate;

use App\Http\Livewire\Booking\Affiliate\Index;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class IndexTest extends TestCase
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
     * @group affiliate
     * @group affiliate-index
     *
     * @return void
     */
    public function affiliateIndexShowsCarsAndFilters()
    {
        $this->actingAs($this->admin);

        $user1 = $this->createUser(['role' => 'affiliate']);
        $affiliate1 = $this->createAffiliate(['name' => 'Fistro', 'user_id' => $user1->id]);

        $user2 = $this->createUser(['role' => 'affiliate']);
        $affiliate2 = $this->createAffiliate(['name' => 'Pecador', 'user_id' => $user2->id]);

        $user3 = $this->createUser(['role' => 'affiliate']);
        $affiliate3 = $this->createAffiliate(['name' => 'Gromenauer', 'user_id' => $user3->id]);

        Livewire::test(Index::class)
            ->assertSee($affiliate1->name)
            ->assertSee($affiliate2->name)
            ->assertSee($affiliate3->name);

        Livewire::test(Index::class)
            ->set('search', $affiliate1->name)
            ->assertSee($affiliate1->name)
            ->assertDontSee($affiliate2->name)
            ->assertDontSee($affiliate3->name);

        Livewire::test(Index::class)
            ->set('search', $affiliate2->name)
            ->assertSee($affiliate2->name)
            ->assertDontSee($affiliate1->name)
            ->assertDontSee($affiliate3->name);

        Livewire::test(Index::class)
            ->set('search', $affiliate3->name)
            ->assertSee($affiliate3->name)
            ->assertDontSee($affiliate1->name)
            ->assertDontSee($affiliate2->name);
    }
}
