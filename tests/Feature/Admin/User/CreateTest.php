<?php

namespace Tests\Feature\Admin\User;

use App\Http\Livewire\Admin\User\Create;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class CreateTest extends TestCase
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
     * @group user-create
     *
     * @return void
     */
    public function createUserValidatesInput()
    {
        $this->actingAs($this->superAdmin);

        Livewire::test(Create::class)
            ->set('name', null)
            ->set('email', null)
            ->set('role', null)
            ->call('saveUser')
            ->assertHasErrors([
                'name' => ['required'],
                'email' => ['required'],
                'role' => ['required'],
            ]);

        Livewire::test(Create::class)
            ->set('name', 'Super Admin')
            ->set('email', 'notanemail')
            ->set('role', 'astronaut')
            ->call('saveUser')
            ->assertHasErrors([
                'email' => ['email'],
                'role' => ['in'],
            ]);

        Livewire::test(Create::class)
            ->set('name', 'Super Admin')
            ->set('email', 'notanemail')
            ->call('saveUser')
            ->assertHasErrors([
                'email' => ['email'],
            ]);

        $otherAdmin = $this->createSuperAdmin();

        Livewire::test(Create::class)
            ->set('name', 'Super Admin')
            ->set('email', $otherAdmin->email)
            ->call('saveUser')
            ->assertHasErrors([
                'email' => ['unique'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group super-admin
     * @group user
     * @group user-create
     *
     * @return void
     */
    public function createUserPostDataSaves()
    {
        $this->actingAs($this->superAdmin);

        Livewire::test(Create::class)
            ->set('name', 'Super Admin')
            ->set('email', 'super.admin@scandinavianehf.com')
            ->set('role', 'superAdmin')
            ->set('blogger', 1)
            ->call('saveUser')
            ->assertStatus(200);

        $user = User::find(2);

        $this->assertEquals("Super Admin", $user->name);
        $this->assertEquals("super.admin@scandinavianehf.com", $user->email);
        $this->assertEquals("superAdmin", $user->role);
        $this->assertEquals(1, $user->blogger);
    }
}
