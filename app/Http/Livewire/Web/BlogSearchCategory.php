<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use App\Models\BlogPost;
use App\Models\BlogTag;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Traits\Livewire\BlogSearchTrait;

class BlogSearchCategory extends Component
{
    use WithPagination;

    use BlogSearchTrait {
        search as protected searchFromBlogSearchTrait;
    }

    protected $queryString = ['search'];

    public $blogCategory;

    public function mount(String $blogCategorySlug, Request $request) {
        $this->search = $request->input('search');          
        $this->blogCategory = BlogCategory::where('slug', 'like' , '%'.$blogCategorySlug.'%')->first();                                            
    }

    protected function queryByCategory() {
        return BlogPost::where('blog_category_id', $this->blogCategory->id);
    }    

    /**
     * Returns the query search for the post that has to be shown
     */
    protected function search() {        
        $ids        = $this->searchFromBlogSearchTrait()->pluck('id')->all();       
        $byCategory = $this->queryByCategory()->pluck('id')->all();

        return BlogPost::whereIn( 'id', array_intersect($ids, $byCategory));
    }

     /**
     * Returns the last text item for the breadcrumb
     */
    protected function getBreadcrumb(): string {
        return $this->blogCategory->name; 
    }

    /**
     * Returns the title for the page
     */
    protected function getTitle(): string {
        return $this->blogCategory->name; 
    }    
}

