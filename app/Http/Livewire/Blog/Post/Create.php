<?php

namespace App\Http\Livewire\Blog\Post;

use App\Models\BlogAuthor;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Livewire\Component;

class Create extends Component
{
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
        ];

        $this->validate($rules);

        // Save the post
        $post = $post->create([
            'title'             => $this->title,
            'slug'              => slugify($this->title),
            'blog_category_id'  => $this->category,
            'blog_author_id'    => $this->author,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Post "' . $this->title . '" created');

        return redirect()->route('intranet.blog.post.edit', $post->hashid);
    }

    public function render()
    {
        return view('livewire.blog.post.create');
    }
}
