<?php

namespace App\Http\Livewire\Blog\Post;

use App\Models\BlogAuthor;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use Livewire\Component;
use Livewire\WithFileUploads;
use Storage;
use Carbon\Carbon;

class Edit extends Component
{
    use WithFileUploads;

    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\BlogPost
     */
    public $post;

    /**
     * @var string
     */
    public $title;

     /**
     * @var string
     */
    public $slug;

     /**
     * @var string
     */
    public $published_at;

      /**
     * @var string
     */
    public $published_at_hour;

     /**
     * @var bool
     */
    public $hero;

     /**
     * @var bool
     */
    public $top;

    /**
     * @var string
     */
    public $category;

    /**
     * @var array
     */
    public $categories;

    /**
     * @var string
     */
    public $author;

    /**
     * @var array
     */
    public $authors;

    /**
     * @var array
     */
    public $tags;

    /**
     * @var array
     */
    public $allTags;

    /**
     * @var string
     */
    public $summary;

    /**
     * @var string
     */
    public $content;

    /**
     * @var array
     */
    public $hours = [];    

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(BlogPost $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->published_at = $post->published_at?->format('d-m-Y');
        $this->published_at_hour = $post->published_at ? roundUpToMinuteInterval($post->published_at)->format('H:i') : '12:00';
        $this->hero = $post->hero;
        $this->top = $post->top;
        $this->category = $post->blog_category_id;
        $this->author = $post->blog_author_id;
        $this->summary = $post->summary;
        $this->content = $post->content;
        $this->categories = BlogCategory::pluck('name', 'id');
        $this->authors = BlogAuthor::pluck('name', 'id');
        $this->allTags = BlogTag::pluck('name', 'id');
        $this->tags = $post->tags->pluck('id')->toArray();
        $this->hours = hours_dropdown();
    }

    public function savePost()
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'title'             => ['required'],
            'category'          => ['required'],
            'author'            => ['required'],            
            'summary'           => ['max:1023'],
            'published_at'      => ['date_format:d-m-Y'],
            'published_at_hour' => ['date_format:H:i'],
        ];

        $this->validate($rules);       

        $this->post->update([
            'title'             => $this->title,
            'slug'              => $this->slug ? $this->slug : slugify($this->title),           
            'hero'              => $this->hero ? 1 : 0,
            'top'               => $this->top ? 1 : 0,
            'published_at'      => Carbon::createFromFormat("d-m-Y H:i", $this->published_at . " " . $this->published_at_hour),
            'summary'           => $this->summary,
            'content'           => $this->content,
            'blog_category_id'  => $this->category,
            'blog_author_id'    => $this->author,
        ]);

        $this->post->tags()->sync($this->tags ?: null);

        session()->flash('status', 'success');
        session()->flash('message', 'Post "' . $this->title . '" updated');

        return redirect()->route('intranet.blog.post.index');
    }  

    public function deletePost()
    {
        $this->post->delete();

        session()->flash('status', 'success');
        session()->flash('message', __('The post has been deleted'));

        return redirect()->route('intranet.blog.post.index');
    }

    public function render()
    {
        return view('livewire.blog.post.edit');
    }   
}
