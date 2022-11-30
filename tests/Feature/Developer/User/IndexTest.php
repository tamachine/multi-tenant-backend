<?php

namespace Tests\Feature\Developer\User;

use App\Http\Livewire\Developer\User\Index;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class IndexTest extends TestCase
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
     * @group user-index
     *
     * @return void
     */
    public function userIndexShowsUsersAndFilters()
    {
        $this->actingAs($this->developer);

        $developer1 = $this->createDeveloper(['name' => 'Fistro']);
        $developer2 = $this->createDeveloper(['name' => 'Pecador']);
        $developer3 = $this->createDeveloper(['name' => 'Gromenauer']);

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
