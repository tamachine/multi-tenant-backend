<?php

namespace Tests\Feature\Admin\FreeDay;

use App\Http\Livewire\Admin\FreeDay\Create;
use App\Models\FreeDay;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class CreateTest extends TestCase
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
     * @group free-day-create
     *
     * @return void
     */
    public function createFreeDayValidatesInput()
    {
        $this->actingAs($this->admin);

        Livewire::test(Create::class)
            ->set('name', null)
            ->set('min_days', null)
            ->set('max_days', null)
            ->set('days_for_free', null)
            ->call('saveFreeDay')
            ->assertHasErrors([
                'name' => ['required'],
                'min_days' => ['required'],
                'max_days' => ['required'],
                'days_for_free' => ['required'],
            ]);

        Livewire::test(Create::class)
            ->set('name', "Free Day 1")
            ->set('min_days', 0)
            ->set('max_days', -5)
            ->set('days_for_free', -1)
            ->call('saveFreeDay')
            ->assertHasErrors([
                'min_days' => ['gte'],
                'max_days' => ['gt'],
                'days_for_free' => ['gte'],
            ]);

        Livewire::test(Create::class)
            ->set('name', "Free Day 1")
            ->set('min_days', 14)
            ->set('max_days', 12)
            ->set('days_for_free', 1)
            ->call('saveFreeDay')
            ->assertHasErrors([
                'max_days' => ['gt'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group free-day
     * @group free-day-create
     *
     * @return void
     */
    public function createFreeDayPostDataSaves()
    {
        $this->actingAs($this->admin);

        Livewire::test(Create::class)
            ->set('name', "Free Day 1")
            ->set('min_days', 7)
            ->set('max_days', 15)
            ->set('days_for_free', 1)
            ->call('saveFreeDay')
            ->assertStatus(200);

        $freeDay = FreeDay::first();

        $this->assertEquals("Free Day 1", $freeDay->name);
        $this->assertEquals(7, $freeDay->min_days);
        $this->assertEquals(15, $freeDay->max_days);
        $this->assertEquals(1, $freeDay->days_for_free);
    }
}
