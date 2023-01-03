<?php

namespace App\Http\Livewire\Content\FaqCategory;

use App\Models\FaqCategory;
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
        $categories = FaqCategory::livewireSearch($this->search)->paginate(perPage());

        $this->count = $categories->count();

        return view('livewire.content.faq-category.index', ['categories' => $categories, 'search' => $this->search]);
    }
}
