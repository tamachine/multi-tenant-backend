<?php

namespace App\Http\Livewire\Blog\Post;

use App\Models\BlogAuthor;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use Livewire\Component;
use Livewire\WithFileUploads;
use Storage;

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
     * @var bool
     */
    public $published;

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
        $this->published = $post->published;
        $this->hero = $post->hero;
        $this->top = $post->top;
        $this->category = $post->blog_category_id;
        $this->author = $post->blog_author_id;
        $this->summary = $post->summary;
        $this->content = $post->content;
        $this->featured_url = $post->featured_image_url;
        $this->reloadImages();

        $this->categories = BlogCategory::pluck('name', 'id');
        $this->authors = BlogAuthor::pluck('name', 'id');
        $this->allTags = BlogTag::pluck('name', 'id');
        $this->tags = $post->tags->pluck('id')->toArray();
    }

    public function savePost()
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'title'     => ['required'],
            'category'  => ['required'],
            'author'    => ['required'],
            'featured'  => ['nullable', 'mimes:jpeg,jpg,png,gif'],
            'summary'   => ['max:1023'],
        ];

        $this->validate($rules);

        // Check if we need to update the 'published_at' date
        if (!$this->post->published && $this->published) {
            $published_date = now();
        } else {
            $published_date = $this->post->published_at;
        }

        // 1. Update the post
        $this->post->update([
            'title'             => $this->title,
            'slug'              => $this->slug ? $this->slug : slugify($this->title),
            'published'         => $this->published ? 1 : 0,
            'hero'              => $this->hero ? 1 : 0,
            'top'               => $this->top ? 1 : 0,
            'published_at'      => $published_date,
            'summary'           => $this->summary,
            'content'           => $this->content,
            'blog_category_id'  => $this->category,
            'blog_author_id'    => $this->author,
        ]);

        // 2. Update the featured image
        if ($this->featured) {
            $extension = $this->featured->getClientOriginalExtension();
            $filename = $this->post->hashid . "." . $extension;
            $this->featured->storeAs("public/posts" , $filename);

            $this->post->update([
                'featured_image' => $filename,
            ]);
        }

        // 3. Update the tags
        $this->post->tags()->sync($this->tags ?: null);



        session()->flash('status', 'success');
        session()->flash('message', 'Post "' . $this->title . '" updated');

        return redirect()->route('intranet.blog.post.index');
    }

    private function reloadImages()
    {
        $this->images = [];
        $images = Storage::disk('public')->files("posts/" . $this->post->hashid);

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

        $extension = $this->image->getClientOriginalExtension();
        $filename = now()->timestamp . "." . $extension;
        $this->image->storeAs("public/posts/" . $this->post->hashid, $filename);

        $this->reloadImages();
    }

    public function deleteImage($image)
    {
        Storage::disk('public')->delete($image);
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
