<?php

namespace Tests\Feature\Admin\Rate;

use App\Http\Livewire\Admin\Rate\Index;
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
     * @group rate
     * @group rate-index
     *
     * @return void
     */
    public function rateIndexShowsRatesAndFilters()
    {
        $this->actingAs($this->admin);

        $rate1 = $this->createRate(['code' => 'ABC', 'name' => 'A Bé Cé']);
        $rate2 = $this->createRate(['code' => 'FIS', 'name' => 'Fístula']);
        $rate3 = $this->createRate(['code' => 'TRO', 'name' => 'Trondheim']);

        Livewire::test(Index::class)
            ->assertSee($rate1->code)
            ->assertSee($rate2->code)
            ->assertSee($rate3->code);

        Livewire::test(Index::class)
            ->set('search', $rate1->code)
            ->assertSee($rate1->code)
            ->assertDontSee($rate2->code)
            ->assertDontSee($rate3->code);

        Livewire::test(Index::class)
            ->set('search', $rate2->code)
            ->assertSee($rate2->code)
            ->assertDontSee($rate1->code)
            ->assertDontSee($rate3->code);

        Livewire::test(Index::class)
            ->set('search', $rate3->code)
            ->assertSee($rate3->code)
            ->assertDontSee($rate1->code)
            ->assertDontSee($rate2->code);
    }
}
