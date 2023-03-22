<?php

namespace Tests\Feature\Admin\Extra;

use App\Http\Livewire\Admin\Extra\Edit;
use App\Http\Livewire\Admin\Extra\Index;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class DeleteTest extends TestCase
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
     * @group extra-delete
     *
     * @return void
     */
    public function deleteRequestSuccessfullyDeletesExtra()
    {
        $this->actingAs($this->admin);

        $extra = $this->createExtra();

        // We should see the extra
        Livewire::test(Index::class)
            ->assertSee($extra->name);

        // Delete
        Livewire::test(Edit::class, ['extra' => $extra->hashid])
            ->call('deleteExtra', $extra->hashid)
            ->assertRedirect(route('intranet.extra.index'));

        // We should not see the extra
        Livewire::test(Index::class)
            ->assertDontSee($extra->name);
    }
}
