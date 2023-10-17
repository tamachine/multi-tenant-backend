<?php

namespace App\Http\Livewire\Blog\Author;

use App\Models\BlogAuthor;
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
    public $name;

    /**
     * @var string
     */
    public $slug;

    /**
     * @var string
     */
    public $bio;

     /**
     * @var string
     */
    public $short_bio;

    /**
     * @var object
     */
    public $photo;

    /**
     * @var string
     */
    public $photo_url = '';

     /**
     * @var model
     */
    public $author;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        $this->author = new BlogAuthor();
    }

    public function saveAuthor(BlogAuthor $author)
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'name'  => ['required'],
            'photo' => ['nullable', 'mimes:jpeg,jpg,png,gif'],
            'slug'  => ['unique:blog_authors,slug','alpha_dash'],
        ];

        $this->validate($rules);

        $author = $author->create([
            'name'              => $this->name,
            'slug'              => $this->slug ? $this->slug : slugify($this->name),
            'bio'               => $this->bio, 
            'short_bio'         => $this->short_bio
        ]);

       

        session()->flash('status', 'success');
        session()->flash('message', 'Author "' . $this->name . '" created');

        return redirect()->route('intranet.blog.author.edit', $author->hashid);
    }

    public function render()
    {
        return view('livewire.blog.author.create');
    }
}
