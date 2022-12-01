<?php

namespace Tests\Feature\Developer\User;

use App\Http\Livewire\Developer\User\Index;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    use RefreshDatabase;

    protected $developer;

    public function setUp(): void
    {
        parent::setUp();
        $this->developer = $this->createDeveloper();
    }

    /**
     * @test
     * @group feature
     * @group developer
     * @group user
     * @group user-delete
     *
     * @return void
     */
    public function deleteRequestSuccessfullyDeletesUser()
    {
        $this->actingAs($this->developer);

        $user = $this->createDeveloper();

        // We should see the developer
        Livewire::test(Index::class)
            ->assertSee($user->name);

        // Delete developer
        Livewire::test(Index::class)
            ->call('deleteUser', $user['hashid'])
            ->assertStatus(200);

        // We should not see the developer
        Livewire::test(Index::class)
            ->assertDontSee($user->name);
    }
}
