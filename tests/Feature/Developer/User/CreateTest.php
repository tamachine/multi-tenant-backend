<?php

namespace Tests\Feature\Developer\User;

use App\Http\Livewire\Developer\User\Create;
use App\Models\User;
use App\Notifications\SendWelcomeMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Livewire;
use Tests\TestCase;

class CreateTest extends TestCase
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
     * @group user-create
     *
     * @return void
     */
    public function createUserValidatesInput()
    {
        $this->actingAs($this->developer);

        Livewire::test(Create::class)
            ->set('name', null)
            ->set('email', null)
            ->call('saveUser')
            ->assertHasErrors([
                'name' => ['required'],
                'email' => ['required'],
            ]);

        Livewire::test(Create::class)
            ->set('name', 'Unicornio Devélopez')
            ->set('email', 'notanemail')
            ->call('saveUser')
            ->assertHasErrors([
                'email' => ['email'],
            ]);

        $otherDeveloper = $this->createDeveloper();

        Livewire::test(Create::class)
            ->set('name', 'Unicornio Devélopez')
            ->set('email', $otherDeveloper->email)
            ->call('saveUser')
            ->assertHasErrors([
                'email' => ['unique'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group developer
     * @group user
     * @group user-create
     *
     * @return void
     */
    public function createUserPostDataSavesWithNotification()
    {
        $this->actingAs($this->developer);

        Notification::fake();

        Livewire::test(Create::class)
            ->set('name', 'Unicornio Devélopez')
            ->set('email', 'unicornio@scandinavianehf.com')
            ->set('welcome', true)
            ->call('saveUser')
            ->assertStatus(200);

        $user = User::find(2);

        $this->assertEquals("Unicornio Devélopez", $user->name);
        $this->assertEquals("unicornio@scandinavianehf.com", $user->email);
        $this->assertEquals("developer", $user->role);
        $this->assertEquals(1, $user->blogger);

        Notification::assertSentTo($user, SendWelcomeMail::class);
    }

    /**
     * @test
     * @group feature
     * @group developer
     * @group user
     * @group user-create
     *
     * @return void
     */
    public function createUserPostDataSavesWithoutNotification()
    {
        $this->actingAs($this->developer);

        Notification::fake();

        Livewire::test(Create::class)
            ->set('name', 'Unicornio Devélopez')
            ->set('email', 'unicornio@scandinavianehf.com')
            ->set('welcome', false)
            ->call('saveUser')
            ->assertStatus(200);

        $user = User::find(2);

        $this->assertEquals("Unicornio Devélopez", $user->name);
        $this->assertEquals("unicornio@scandinavianehf.com", $user->email);
        $this->assertEquals("developer", $user->role);
        $this->assertEquals(1, $user->blogger);

        Notification::assertNothingSent();
    }
}
