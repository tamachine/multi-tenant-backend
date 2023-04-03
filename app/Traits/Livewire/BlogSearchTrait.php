<?php

namespace App\Traits\Livewire;

use App\Models\BlogPost;
use App\Models\BlogTag;

trait BlogSearchTrait
{
    /**
     * @var string
     */
    public $search;
   
     /**
     * @var string
     */
    public $tagHashid = null;

     /**
     * @var string
     */
    public $title ='title';

     /**
     * @var string
     */
    public $subtitle = 'subtitle';

     /**
     * @var Collection
     */
    protected $posts;    

    /**
     * Method to be called in the view when the tag button is clicked
     */
    public function searchByTag($hashid) {        
        if($this->tagHashid == $hashid) {
            $this->tagHashid = null;
        } else {
            $this->tagHashid = $hashid;            
        }        
    }  

    /**
     * Returns the query for the post related with the introruced string search
     */
    protected function queryByString() {
        return BlogPost::livewireSearch($this->search);
    }

    /**
     * Returns the query for the post related with the selected tag
     */
    protected function queryByTag() {
        return BlogTag::where('hashid', $this->tagHashid)->first()->posts();
    }

    /**
     * Returns the query search for the post that has to be shown
     */
    protected function search() {        
        $ids = $this->queryByString()->pluck('id')->all();

        if($this->tagHashid != null) {
            $byTags = $this->queryByTag()->pluck('blog_posts.id')->all();
            $ids    = array_intersect($ids, $byTags);
        }
        
        return BlogPost::whereIn( 'id', $ids);
    }    

    /**
     * Returns the post to be shown in the page
     */
    protected function getPosts() {
        return $this->search()->published()->paginate(6); 
    }

    /**
     * Returns the title for the page
     */
    protected function getTitle(): string {
        return $this->search == '' ? __('blog-search.search-title') : $this->search; 
    }

    /**
     * Returns the subtitle for the page
     */
    protected function getSubtitle(): string {
        return __('blog-search.category-subtitle'); 
    }

    /**
     * Returns the last text item for the breadcrumb
     */
    protected function getBreadcrumb(): string {
        return __('blog-search.breadcrumb'); 
    }

    /**
     * render the view for the filtered posts
     */
    public function render()
    {
        $this->title    = $this->getTitle();  
        $this->subtitle = $this->getSubtitle();  
       
        return view(
            'livewire.web.blog-search-string', 
            [           
                'tags'        => BlogTag::has('postsPublished')->get(),
                'posts'       => $this->getPosts(),        
                'breadcrumbs' => getBreadcrumb(['home', 'blog', $this->getBreadcrumb()]),                           
            ]               
        );
    }
}

