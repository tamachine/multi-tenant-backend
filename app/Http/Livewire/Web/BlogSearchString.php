<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use App\Traits\Livewire\BlogSearchTrait;
use App\Models\BlogTag;

class BlogSearchString extends Component
{
    use WithPagination;

    use BlogSearchTrait {
        getSubtitle as protected getSubtitleFromBlogSearchTrait;
    }

    protected $queryString = ['search'];

    public function mount(Request $request) {
        $this->search = $request->input('search');                                                      
        $this->tagHashid = $request->input('tag');  
    }      

    /**
     * Returns the subtitle for the page
     */
    protected function getSubtitle(): string {
        return BlogTag::where('hashid', $this->tagHashid)->first()?->name ?? $this->getSubtitleFromBlogSearchTrait();
    }
}

