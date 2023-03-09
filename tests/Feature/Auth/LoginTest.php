<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_view_login_page()
    {
        $this->get(route('login'))
            ->assertSuccessful()
            ->assertSeeLivewire('auth.login');
    }

    /** @test */
    public function is_redirected_if_already_logged_in()
    {
        $user = User::factory()->create();

        $this->be($user);

        $this->get(route('login'))
            ->assertRedirect(route('intranet.dashboard'));
    }

    /** @test */
    public function a_user_can_login_with_email()
    {
        $user = User::factory()->create(['password' => Hash::make('password')]);

        Livewire::test('auth.login')
            ->set('username_email', $user->email)
            ->set('password', 'password')
            ->call('authenticate');

        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function a_user_can_login_with_username()
    {
        $user = User::factory()->create(['password' => Hash::make('password')]);

        Livewire::test('auth.login')
            ->set('username_email', $user->username)
            ->set('password', 'password')
            ->call('authenticate');

        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function is_redirected_to_the_home_page_after_login()
    {
        $user = User::factory()->create(['password' => Hash::make('password')]);

        Livewire::test('auth.login')
            ->set('username_email', $user->email)
            ->set('password', 'password')
            ->call('authenticate')
            ->assertRedirect(route('intranet.dashboard'));
    }

    /** @test */
    public function username_or_email_is_required()
    {
        $user = User::factory()->create(['password' => Hash::make('password')]);

        Livewire::test('auth.login')
            ->set('password', 'password')
            ->call('authenticate')
            ->assertHasErrors(['username_email' => 'required']);
    }

    /** @test */
    public function password_is_required()
    {
        $user = User::factory()->create(['password' => Hash::make('password')]);

        Livewire::test('auth.login')
            ->set('username_email', $user->email)
            ->call('authenticate')
            ->assertHasErrors(['password' => 'required']);
    }

    /** @test */
    public function bad_login_attempt_shows_message()
    {
        $user = User::factory()->create();

        Livewire::test('auth.login')
            ->set('username_email', $user->email)
            ->set('password', 'bad-password')
            ->call('authenticate')
            ->assertHasErrors('username_email');

        $this->assertFalse(Auth::check());
    }
}
