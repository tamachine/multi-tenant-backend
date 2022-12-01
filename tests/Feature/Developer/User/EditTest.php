<?php

namespace Tests\Feature\Developer\User;

use App\Http\Livewire\Developer\User\Index;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class EditTest extends TestCase
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
     * @group user-edit
     *
     * @return void
     */
    public function theEditUserPostDataFails()
    {
        $this->actingAs($this->developer);

        $developer = $this->createDeveloper();

        $users = [
            [
                'hashid' => $developer->hashid,
                'name' => null,
                'email' => $developer->email,
                'test' => true,
            ]
        ];

        Livewire::test(Index::class)
            ->set('users', $users)
            ->call('editUser', 0)
            ->assertHasErrors([
                'users.0.name' => ['required'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group developer
     * @group user
     * @group user-edit
     *
     * @return void
     */
    public function theEditUserPostDataSaves()
    {
        $this->actingAs($this->developer);

        $developer = $this->createDeveloper();

        $users = [
            [
                'hashid' => $developer->hashid,
                'name' => 'Unicornio Devélopez',
                'email' => $developer->email,
                'test' => true,
            ]
        ];

        Livewire::test(Index::class)
            ->set('users', $users)
            ->call('editUser', 0)
            ->assertStatus(200);

        $user = User::find(2);

        $this->assertEquals("Unicornio Devélopez", $user->name);
        $this->assertEquals($developer->email, $user->email);
        $this->assertEquals("developer", $user->role);
    }
}
