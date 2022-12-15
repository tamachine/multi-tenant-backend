<?php

namespace App\Http\Livewire\Content\Translation;

use App\Models\Translation;
use Livewire\Component;
use Livewire\WithPagination;

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
        $translations = Translation::livewireSearch($this->search)->paginate(perPage());

        $this->count = $translations->count();

        return view('livewire.content.translation.index', ['translations' => $translations, 'search' => $this->search]);
    }
}
