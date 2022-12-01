<?php

namespace Tests\Feature\Admin\User;

use App\Http\Livewire\Admin\User\Index;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    use RefreshDatabase;

    protected $superAdmin;

    public function setUp(): void
    {
        parent::setUp();
        $this->superAdmin = $this->createSuperAdmin();
    }

    /**
     * @test
     * @group feature
     * @group super-admin
     * @group user
     * @group user-delete
     *
     * @return void
     */
    public function deleteRequestSuccessfullyDeletesUser()
    {
        $this->actingAs($this->superAdmin);

        $user = $this->createSuperAdmin();

        // We should see the super admin
        Livewire::test(Index::class)
            ->assertSee($user->name);

        // Delete super admin
        Livewire::test(Index::class)
            ->call('deleteUser', $user['hashid'])
            ->assertStatus(200);

        // We should not see the super admin
        Livewire::test(Index::class)
            ->assertDontSee($user->name);
    }
}
