<?php

namespace App\Http\Livewire\Blog\Post;

use App\Models\BlogPost;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\Livewire\OrderTableTrait;

class Index extends Component
{
    use WithPagination;
    use OrderTableTrait;

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
        $this->order_column = 'published_at';
    }

    public function render()
    {
        $posts = BlogPost::livewireSearch($this->search)
            ->with(['category', 'author'])
            ->orderBy($this->order_column, $this->order_way)
            ->paginate(perPage());


        return view('livewire.blog.post.index', ['posts' => $posts]);
    }
}
