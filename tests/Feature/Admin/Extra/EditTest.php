<?php

namespace Tests\Feature\Admin\Extra;

use App\Http\Livewire\Admin\Extra\Edit;
use App\Models\Extra;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class EditTest extends TestCase
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
     * @group extra
     * @group extra-edit
     *
     * @return void
     */
    public function theEditExtraPostDataFails()
    {
        $this->actingAs($this->admin);

        $extra = $this->createExtra();

        Livewire::test(Edit::class, ['extra' => $extra->hashid])
            ->set('name', null)
            ->call('saveExtra')
            ->assertHasErrors([
                'name' => ['required'],
            ]);

        Livewire::test(Edit::class, ['extra' => $extra->hashid])
            ->set('price', -5)
            ->set('maximum_fee', 'fistro')
            ->call('saveExtra')
            ->assertHasErrors([
                'price' => ['gte'],
                'maximum_fee' => ['numeric'],
            ]);
    }

    /**
     * @test
     * @group feature
     * @group admin
     * @group extra
     * @group extra-edit
     *
     * @return void
     */
    public function theEditExtraPostDataSaves()
    {
        $this->actingAs($this->admin);

        $extra = $this->createExtra();

        Livewire::test(Edit::class, ['extra' => $extra->hashid])
            ->set('name', "Extra 1")
            ->set('description', "Extra Description 1")
            ->set('active', true)
            ->set('price', 1000)
            ->set('maximum_fee', 800000)
            ->set('max_units', 10)
            ->set('price_mode', 'per_day')
            ->set('category', 'insurance')
            ->set('included', false)
            ->set('insurance_premium', true)
            ->call('saveExtra')
            ->assertStatus(200);

        $extra = Extra::first();

        $this->assertEquals("Extra 1", $extra->name);
        $this->assertEquals("Extra Description 1", $extra->description);
        $this->assertEquals(1, $extra->active);
        $this->assertEquals(1000, $extra->price);
        $this->assertEquals(800000, $extra->maximum_fee);
        $this->assertEquals(10, $extra->max_units);
        $this->assertEquals('per_day', $extra->price_mode);
        $this->assertEquals('insurance', $extra->category);
        $this->assertEquals(0, $extra->included);
        $this->assertEquals(1, $extra->insurance_premium);
    }
}
