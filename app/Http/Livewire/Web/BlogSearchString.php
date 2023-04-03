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

    protected $queryString = ['search', 'tag'];

    public $tag;

    public function mount(Request $request) {
        $this->search = $request->input('search');                                                      
        
        if($request->input('tag')) {
            $this->tag = $request->input('tag');
            $this->tagHashid = BlogTag::where('slug', 'like', '%'. $this->tag .'%')->first()?->hashid;
        }
    }      

    /**
     * Returns the subtitle for the page
     */
    protected function getSubtitle(): string {
        return BlogTag::where('hashid', $this->tagHashid)->first()?->name ?? $this->getSubtitleFromBlogSearchTrait();
    }
}

