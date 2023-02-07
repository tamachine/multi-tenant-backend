<?php

namespace App\Http\Livewire\Blog\Post;

use App\Models\BlogPost;
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
        $posts = BlogPost::livewireSearch($this->search)
            ->orderBy("created_at", "desc")
            ->paginate(perPage());

        return view('livewire.blog.post.index', ['posts' => $posts]);
    }
}
