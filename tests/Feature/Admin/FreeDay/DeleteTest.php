<?php

namespace Tests\Feature\Admin\FreeDay;

use App\Http\Livewire\Admin\FreeDay\Index;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class DeleteTest extends TestCase
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
     * @group free-day-delete
     *
     * @return void
     */
    public function deleteRequestSuccessfullyDeletesFreeDay()
    {
        $this->actingAs($this->admin);

        $freeDay = $this->createFreeDay();

        // We should see the free day
        Livewire::test(Index::class)
            ->assertSee($freeDay->name);

        // Delete free day
        Livewire::test(Index::class)
            ->call('deleteFreeDay', $freeDay['hashid'])
            ->assertStatus(200);

        // We should not see the free day
        Livewire::test(Index::class)
            ->assertDontSee($freeDay->name);
    }
}
