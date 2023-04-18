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
    public $images = [];

     /**
     * @var object
     */
    public $image;

    /**
     * @var object
     */
    public $featured;

    /**
     * @var string
     */
    public $featured_url = '';

    /**
     * @var object
     */
    public $featured_hover;

    /**
     * @var string
     */
    public $featured_hover_url = '';

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
        $this->featured_url = $post->featured_image_url;
        $this->featured_hover_url = $post->featured_image_hover_url;

        $this->reloadImages();

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
            'featured'          => ['nullable', 'mimes:jpeg,jpg,png,gif'],
            'featured_hover'    => ['nullable', 'mimes:jpeg,jpg,png,gif'],
            'summary'           => ['max:1023'],
            'published_at'      => ['date_format:d-m-Y'],
            'published_at_hour' => ['date_format:H:i'],
        ];

        $this->validate($rules);       

        // 1. Update the post
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

        // 2. Update the featured image
        if ($this->featured) {
            $this->post->uploadFeaturedImageDefault($this->featured);
        }

        // 3. Update the featured image hover
        if ($this->featured_hover) {
            $this->post->uploadFeaturedImageHover($this->featured_hover);
        }

        // 4. Update the tags
        $this->post->tags()->sync($this->tags ?: null);

        session()->flash('status', 'success');
        session()->flash('message', 'Post "' . $this->title . '" updated');

        return redirect()->route('intranet.blog.post.index');
    }

    private function reloadImages()
    {
        $this->images = [];

        $images = $this->post->getImages();

        foreach ($images as $image) {
            $this->images[] = [
                'file' => $image,
                'route' => 'paco',
            ];
        }
    }

    public function addImage()
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'image'      => ['mimes:jpeg,jpg,png,gif'],
        ],
        [
            'image.mimes' => 'The image must be a file of type: jpeg, jpg, png, gif'
        ]);

        $this->post->uploadImage($this->image);

        $this->reloadImages();        
    }

    public function deleteImage($image)
    {
        $this->post->deleteImage($image);
        
        $this->reloadImages();
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
