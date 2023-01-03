<?php

namespace App\Http\Livewire\Content\Faq;

use App\Models\Faq;
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
     * @var string
     */
    public $faq_category = "";

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
        $faqs = Faq::livewireSearch($this->faq_category, $this->search)->paginate(perPage());

        $this->count = $faqs->count();

        return view('livewire.content.faq.index', ['faqs' => $faqs, 'categories' => FaqCategory::all(), 'search' => $this->search]);
    }
}
