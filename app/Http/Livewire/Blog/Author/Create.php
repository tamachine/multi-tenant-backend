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
    public $meta_title;

     /**
     * @var string
     */
    public $meta_description;

    /**
     * @var object
     */
    public $photo;

    /**
     * @var string
     */
    public $photo_url = '';

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        //
    }

    public function saveAuthor(BlogAuthor $author)
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'name'  => ['required'],
            'photo' => ['nullable', 'mimes:jpeg,jpg,png,gif'],
        ];

        $this->validate($rules);

        $author = $author->create([
            'name'              => $this->name,
            'slug'              => $this->slug ? $this->slug : slugify($this->name),
            'bio'               => $this->bio,
            'meta_title'        => $this->meta_title,
            'meta_description'  => $this->meta_description,
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
