<?php

namespace Tests\Feature\Booking\Affiliate;

use App\Http\Livewire\Booking\Affiliate\Edit;
use App\Models\Affiliate;
use App\Models\User;
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
        $this->bookingAgent = $this->createBookingAgent();
    }

    /**
     * @test
     * @group feature
     * @group booking
     * @group affiliate
     * @group affiliate-edit
     *
     * @return void
     */
    public function createAffiliateValidatesInput()
    {
        $this->actingAs($this->bookingAgent);

        $user = $this->createUser(['role' => 'affiliate']);
        $affiliate = $this->createAffiliate(['user_id' => $user->id]);

        Livewire::test(Edit::class, ['affiliate' => $affiliate])
            ->set('name', null)
            ->set('username', null)
            ->set('commission_percentage', null)
            ->call('editAffiliate')
            ->assertHasErrors([
                'name' => ['required'],
                'username' => ['required'],
                'commission_percentage' => ['required'],
            ]);

        Livewire::test(Edit::class, ['affiliate' => $affiliate])
            ->set('email', 'zapato')
            ->call('editAffiliate')
            ->assertHasErrors([
                'email' => ['email'],
            ]);

        Livewire::test(Edit::class, ['affiliate' => $affiliate])
            ->set('commission_percentage', 'x')
            ->call('editAffiliate')
            ->assertHasErrors([
                'commission_percentage' => ['numeric'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group booking
     * @group affiliate
     * @group affiliate-edit
     *
     * @return void
     */
    public function editAffiliatePostDataSaves()
    {
        $this->actingAs($this->bookingAgent);

        $user = $this->createUser(['role' => 'affiliate']);
        $affiliate = $this->createAffiliate(['user_id' => $user->id]);

        Livewire::test(Edit::class, ['affiliate' => $affiliate])
            ->set('name', 'Chichipapa')
            ->set('username', 'chichipapa')
            ->set('email', 'chichi@papa.com')
            ->set('password', 'mojito69.com')
            ->set('commission_percentage', 15)
            ->call('editAffiliate')
            ->assertStatus(200);

        $affiliate = Affiliate::first();

        $this->assertEquals('Chichipapa', $affiliate->name);
        $this->assertEquals(15, $affiliate->commission_percentage);

        $user = User::orderBy('id', 'desc')->first();
        $this->assertEquals('Chichipapa', $user->name);
        $this->assertEquals('chichipapa', $user->username);
        $this->assertEquals('chichi@papa.com', $user->email);
        $this->assertEquals('affiliate', $user->role);
    }
}
