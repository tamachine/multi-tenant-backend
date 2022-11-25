<?php

namespace Tests\Feature\Admin\FreeDay;

use App\Http\Livewire\Admin\FreeDay\Index;
use App\Models\FreeDay;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class EditTest extends TestCase
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
     * @group free-day-edit
     *
     * @return void
     */
    public function theEditFreeDayPostDataFails()
    {
        $this->actingAs($this->admin);

        $freeDay = $this->createFreeDay();

        $days = [
            [
                'hashid' => $freeDay->hashid,
                'test' => true,
                'name' => null,
                'min_days' => null,
                'max_days' => null,
                'days_for_free' => null,
            ]
        ];

        Livewire::test(Index::class)
            ->set('days', $days)
            ->call('editDay', 0)
            ->assertHasErrors([
                'days.0.name' => ['required'],
                'days.0.min_days' => ['required'],
                'days.0.max_days' => ['required'],
                'days.0.days_for_free' => ['required'],
            ]);

        $days = [
            [
                'hashid' => $freeDay->hashid,
                'test' => true,
                'name' => "Free Day 1",
                'min_days' => 0,
                'max_days' => -5,
                'days_for_free' => -1,
            ]
        ];

        Livewire::test(Index::class)
            ->set('days', $days)
            ->call('editDay', 0)
            ->assertHasErrors([
                'days.0.min_days' => ['gte'],
                'days.0.max_days' => ['gt'],
                'days.0.days_for_free' => ['gte'],
            ]);

        $days = [
            [
                'hashid' => $freeDay->hashid,
                'test' => true,
                'name' => "Free Day 1",
                'min_days' => 14,
                'max_days' => 12,
                'days_for_free' => 1,
            ]
        ];

        Livewire::test(Index::class)
            ->set('days', $days)
            ->call('editDay', 0)
            ->assertHasErrors([
                'days.0.max_days' => ['gt'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group free-day
     * @group free-day-edit
     *
     * @return void
     */
    public function theEditFreeDayPostDataSaves()
    {
        $this->actingAs($this->admin);

        $freeDay = $this->createFreeDay();

        $days = [
            [
                'hashid' => $freeDay->hashid,
                'test' => true,
                'name' => "Free Day 1",
                'min_days' => 7,
                'max_days' => 15,
                'days_for_free' => 1,
            ]
        ];

        Livewire::test(Index::class)
            ->set('days', $days)
            ->set('test', true)
            ->call('editDay', 0)
            ->assertStatus(200);

        $freeDay = FreeDay::first();

        $this->assertEquals("Free Day 1", $freeDay->name);
        $this->assertEquals(7, $freeDay->min_days);
        $this->assertEquals(15, $freeDay->max_days);
        $this->assertEquals(1, $freeDay->days_for_free);
    }
}
