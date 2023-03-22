<?php

namespace Tests\Feature\Admin\Rate;

use App\Http\Livewire\Admin\Rate\Edit;
use App\Models\Rate;
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
     * @group rate
     * @group rate-edit
     *
     * @return void
     */
    public function theEditRatePostDataFails()
    {
        $this->actingAs($this->admin);

        $rate = $this->createRate();

        Livewire::test(Edit::class, ['rate' => $rate->id])
            ->set('code', null)
            ->set('name', null)
            ->set('value', null)
            ->call('saveRate')
            ->assertHasErrors([
                'code' => ['required'],
                'name' => ['required'],
                'value' => ['required'],
            ]);

        Livewire::test(Edit::class, ['rate' => $rate->id])
            ->set('code', 'EUR')
            ->set('name', 'Euro')
            ->set('value', 'chichipapa')
            ->call('saveRate')
            ->assertHasErrors([
                'value' => ['numeric'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group rate
     * @group rate-edit
     *
     * @return void
     */
    public function theEditRatePostDataSaves()
    {
        $this->actingAs($this->admin);

        $rate = $this->createRate();

        Livewire::test(Edit::class, ['rate' => $rate->id])
            ->set('code', 'EUR')
            ->set('name', 'Euro')
            ->set('value', 0.95)
            ->call('saveRate')
            ->assertStatus(200);

        $rate = Rate::first();

        $this->assertEquals("EUR", $rate->code);
        $this->assertEquals("Euro", $rate->name);
        $this->assertEquals(0.95, $rate->rate);
    }
}
