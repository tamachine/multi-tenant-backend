<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use App\Models\BlogPost;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use App\Traits\Livewire\BlogSearchTrait;
use App\Models\BlogAuthor;

class BlogSearchAuthor extends Component
{
    use WithPagination;

    use BlogSearchTrait {
        search as protected searchFromBlogSearchTrait;
    }

    protected $queryString = ['search'];

    public $blogAuthor;

    public function mount(String $blogAuthorSlug, Request $request) {
        $this->search       = $request->input('search');          
        $this->blogAuthor   = BlogAuthor::where('slug', 'like', '%'.$blogAuthorSlug.'%')->first();                                            
    }
    
    protected function queryByAuthor() {
        return BlogPost::where('blog_author_id', $this->blogAuthor->id);
    }

     /**
     * Returns the query search for the post that has to be shown
     */
    protected function search() {        
        $ids        = $this->searchFromBlogSearchTrait()->pluck('id')->all();       
        $byAuthor   = $this->queryByAuthor()->pluck('id')->all();

        return BlogPost::whereIn( 'id', array_intersect($ids, $byAuthor));
    }

    /**
     * Returns the last text item for the breadcrumb
     */
    protected function getBreadcrumb(): string {
        return $this->blogAuthor->name; 
    }

    /**
     * Returns the title for the page
     */
    protected function getTitle(): string {
        return $this->blogAuthor->name; 
    }

    /**
     * Returns the subtitle for the page
     */
    protected function getSubtitle(): string {
        return $this->blogAuthor->short_bio ?? '';  
    }
}

