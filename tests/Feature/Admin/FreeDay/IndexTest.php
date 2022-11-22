<?php

namespace Tests\Feature\Admin\FreeDay;

use App\Http\Livewire\Admin\FreeDay\Index;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->admin = $this->createUser();
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group free-day
     * @group free-day-index
     *
     * @return void
     */
    public function userIndexShowsFreeDaysAndFilters()
    {
        $this->actingAs($this->admin);

        $freeDay1 = $this->createFreeDay(['name' => 'Fistro']);
        $freeDay2 = $this->createFreeDay(['name' => 'Pecador']);
        $freeDay3 = $this->createFreeDay(['name' => 'Gromenauer']);

        Livewire::test(Index::class)
            ->assertSee($freeDay1->name)
            ->assertSee($freeDay2->name)
            ->assertSee($freeDay3->name);

        Livewire::test(Index::class)
            ->set('search', $freeDay1->name)
            ->assertSee($freeDay1->name)
            ->assertDontSee($freeDay2->name)
            ->assertDontSee($freeDay3->name);

        Livewire::test(Index::class)
            ->set('search', $freeDay2->name)
            ->assertSee($freeDay2->name)
            ->assertDontSee($freeDay1->name)
            ->assertDontSee($freeDay3->name);

        Livewire::test(Index::class)
            ->set('search', $freeDay3->name)
            ->assertSee($freeDay3->name)
            ->assertDontSee($freeDay1->name)
            ->assertDontSee($freeDay2->name);
    }
}
