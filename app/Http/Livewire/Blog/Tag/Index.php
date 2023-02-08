<?php

namespace App\Http\Livewire\Blog\Tag;

use App\Models\BlogTag;
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
        //
    }

    public function render()
    {
        $tags = BlogTag::livewireSearch($this->search)
            ->orderBy("name", "asc")
            ->paginate(perPage());

        return view('livewire.blog.tag.index', ['tags' => $tags]);
    }
}
