<?php

namespace Tests\Feature\Admin\User;

use App\Http\Livewire\Admin\User\Index;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class IndexTest extends TestCase
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
     * @group user-index
     *
     * @return void
     */
    public function userIndexShowsUsersAndFilters()
    {
        $this->actingAs($this->superAdmin);

        $developer1 = $this->createAdmin(['name' => 'Fistro']);
        $developer2 = $this->createAdmin(['name' => 'Pecador']);
        $developer3 = $this->createAdmin(['name' => 'Gromenauer']);

        Livewire::test(Index::class)
            ->assertSee($developer1->name)
            ->assertSee($developer2->name)
            ->assertSee($developer3->name);

        Livewire::test(Index::class)
            ->set('search', $developer1->name)
            ->assertSee($developer1->name)
            ->assertDontSee($developer2->name)
            ->assertDontSee($developer3->name);

        Livewire::test(Index::class)
            ->set('search', $developer2->name)
            ->assertSee($developer2->name)
            ->assertDontSee($developer1->name)
            ->assertDontSee($developer3->name);

        Livewire::test(Index::class)
            ->set('search', $developer3->name)
            ->assertSee($developer3->name)
            ->assertDontSee($developer1->name)
            ->assertDontSee($developer2->name);
    }
}
