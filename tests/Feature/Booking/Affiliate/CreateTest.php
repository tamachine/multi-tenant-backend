<?php

namespace Tests\Feature\Booking\Affiliate;

use App\Http\Livewire\Booking\Affiliate\Create;
use App\Models\Affiliate;
use App\Models\User;
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
        $this->bookingAgent = $this->createBookingAgent();
    }

    /**
     * @test
     * @group feature
     * @group booking
     * @group affiliate
     * @group affiliate-create
     *
     * @return void
     */
    public function createAffiliateValidatesInput()
    {
        $this->actingAs($this->bookingAgent);

        Livewire::test(Create::class)
            ->set('name', null)
            ->set('username', null)
            ->set('password', null)
            ->set('commission_percentage', null)
            ->call('saveAffiliate')
            ->assertHasErrors([
                'name' => ['required'],
                'username' => ['required'],
                'password' => ['required'],
                'commission_percentage' => ['required'],
            ]);

        Livewire::test(Create::class)
            ->set('email', 'zapato')
            ->call('saveAffiliate')
            ->assertHasErrors([
                'email' => ['email'],
            ]);

        Livewire::test(Create::class)
            ->set('commission_percentage', 'x')
            ->call('saveAffiliate')
            ->assertHasErrors([
                'commission_percentage' => ['numeric'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group booking
     * @group affiliate
     * @group affiliate-create
     *
     * @return void
     */
    public function createAffiliatePostDataSaves()
    {
        $this->actingAs($this->bookingAgent);

        Livewire::test(Create::class)
            ->set('name', 'Chichipapa')
            ->set('username', 'chichipapa')
            ->set('email', 'chichi@papa.com')
            ->set('password', 'mojito69.com')
            ->set('commission_percentage', 15)
            ->call('saveAffiliate')
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
