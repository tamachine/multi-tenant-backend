<?php

namespace Tests\Feature\Admin\Rate;

use App\Http\Livewire\Admin\Rate\Create;
use App\Models\Rate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected $vendor;

    public function setUp(): void
    {
        parent::setUp();
        $this->admin = $this->createUser();
        $this->vendor = $this->createVendor();
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group rate
     * @group rate-create
     *
     * @return void
     */
    public function createRateValidatesInput()
    {
        $this->actingAs($this->admin);

        Livewire::test(Create::class)
            ->set('code', null)
            ->set('name', null)
            ->set('value', null)
            ->call('saveRate')
            ->assertHasErrors([
                'code' => ['required'],
                'name' => ['required'],
                'value' => ['required'],
            ]);

        Livewire::test(Create::class)
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
     * @group rate-create
     *
     * @return void
     */
    public function createRatePostDataSaves()
    {
        $this->actingAs($this->admin);

        Livewire::test(Create::class)
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
