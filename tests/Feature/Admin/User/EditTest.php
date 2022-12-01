<?php

namespace Tests\Feature\Admin\User;

use App\Http\Livewire\Admin\User\Index;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class EditTest extends TestCase
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
     * @group user-edit
     *
     * @return void
     */
    public function theEditUserPostDataFails()
    {
        $this->actingAs($this->superAdmin);

        $admin = $this->createAdmin();

        $users = [
            [
                'hashid' => $admin->hashid,
                'name' => null,
                'email' => $admin->email,
                'role' => 'astronaut',
                'test' => true,
            ]
        ];

        Livewire::test(Index::class)
            ->set('users', $users)
            ->call('editUser', 0)
            ->assertHasErrors([
                'users.0.name' => ['required'],
                'users.0.role' => ['in'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group super-admin
     * @group user
     * @group user-edit
     *
     * @return void
     */
    public function theEditUserPostDataSaves()
    {
        $this->actingAs($this->superAdmin);

        $admin = $this->createAdmin();

        $users = [
            [
                'hashid' => $admin->hashid,
                'name' => 'Admin Raso',
                'role' => 'admin',
                'email' => $admin->email,
                'blogger' => false,
                'test' => true,
            ]
        ];

        Livewire::test(Index::class)
            ->set('users', $users)
            ->call('editUser', 0)
            ->assertStatus(200);

        $user = User::find(2);

        $this->assertEquals("Admin Raso", $user->name);
        $this->assertEquals($admin->email, $user->email);
        $this->assertEquals("admin", $user->role);
        $this->assertEquals(0, $user->blogger);
    }
}
