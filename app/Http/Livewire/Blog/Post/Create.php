<?php

namespace App\Http\Livewire\Blog\Post;

use App\Models\BlogAuthor;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $title;

    /**
     * @var bool
     */
    public $published;

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
     * @var string
     */
    public $tags;

    /**
     * @var string
     */
    public $summary;

    /**
     * @var string
     */
    public $content;

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

    public function mount()
    {
        $this->categories = BlogCategory::pluck('name', 'id');
        $this->authors = BlogAuthor::pluck('name', 'id');
    }

    public function savePost(BlogPost $post)
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'title'     => ['required'],
            'category'  => ['required'],
            'author'    => ['required'],
            'featured'  => ['required', 'mimes:jpeg,jpg,png,gif'],
        ];

        $this->validate($rules);

        // 1. Save the post
        $post = $post->create([
            'title'             => $this->title,
            'slug'              => slugify($this->title),
            'published'         => $this->published ? 1 : 0,
            'published_at'      => $this->published ? now() : null,
            'summary'           => $this->summary,
            'content'           => $this->content,
            'blog_category_id'  => $this->category,
            'blog_author_id'    => $this->author,
        ]);

        // 2. Upload and store the featured image
        $extension = $this->featured->getClientOriginalExtension();
        $filename = $post->hashid . "." . $extension;
        $this->featured->storeAs("public/posts" , $filename);

        $post->update([
            'featured_image' => $filename,
        ]);

        // 3. Save the tags
        if (!emptyOrNull($this->tags)) {
            $tags = explode(',', $this->tags);

            foreach($tags as $tag) {
                $currentTag = BlogTag::firstOrCreate([
                    'name'  => trim($tag),
                    'slug'  => slugify(trim($tag)),
                ]);
                $post->tags()->attach($currentTag->id);
            }
        }

        session()->flash('status', 'success');
        session()->flash('message', 'Post "' . $this->title . '" created');

        return redirect()->route('blog.post.edit', $post->hashid);
    }

    public function render()
    {
        return view('livewire.blog.post.create');
    }
}
