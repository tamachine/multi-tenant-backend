<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use App\Traits\Livewire\BlogSearchTrait;
use App\Models\BlogTag;

class BlogSearchTop10 extends Component
{
    use WithPagination;

    use BlogSearchTrait {
        search as protected searchFromBlogSearchTrait;
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
     * Returns the query search for the post that has to be shown
     */
    protected function search() {        
        return $this->searchFromBlogSearchTrait()->top();               
    }

    /**
     * Returns the subtitle for the page
     */
    protected function getSubtitle(): string {
        return BlogTag::where('hashid', $this->tagHashid)->first()?->name ?? __('blog-search.top10-subtitle');
    }

     /**
     * Returns the last text item for the breadcrumb
     */
    protected function getBreadcrumb(): string {
        return __('blog-search.top10-breadcrumb'); 
    }

    /**
     * Returns the title for the page
     */
    protected function getTitle(): string {
        return __('blog-search.top10-title'); 
    }   
}

