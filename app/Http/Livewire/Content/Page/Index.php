<?php

namespace App\Http\Livewire\Content\Page;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Page;

class Index extends Component
{
    use WithPagination;

    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $search;

    /**
     * @var int
     */
    public $count;

    /**
     * @var array
     */
    protected $updatesQueryString = [
        'search',
        'page' => ['except' => 1],
    ];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        $this->fill(request()->only('search', 'page'));
    }
   

    public function render()
    {        
        $pages = Page::withoutParams()->livewireSearch($this->search)->paginate(perPage());

        $this->count = $pages->count();

        return view('livewire.content.page.index', ['pages' => $pages, 'search' => $this->search]);
    }
}
