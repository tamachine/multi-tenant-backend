<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use App\Models\BlogTag;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use App\Traits\Livewire\BlogSearchTrait;

class BlogSearchTag extends Component
{
    use WithPagination, BlogSearchTrait;

    protected $queryString = ['search'];

    public $blogTag;

    public function mount(BlogTag $blogTag, Request $request) {
        $this->search       = $request->input('search');          
        $this->blogTag      = $blogTag;       
        $this->tagHashid    = $blogTag->hashid;                                     
    }    
}

