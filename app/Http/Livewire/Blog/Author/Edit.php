<?php

namespace App\Http\Livewire\Blog\Author;

use App\Models\BlogAuthor;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\BlogAuthor
     */
    public $author;

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

    public function mount(BlogAuthor $author)
    {
        $this->author = $author;
        $this->name = $author->name;
        $this->slug = $author->slug;
        $this->bio = $author->bio;
        $this->short_bio = $author->short_bio;
        $this->meta_title = $author->meta_title;
        $this->meta_description = $author->meta_description;
        $this->photo_url = $author->photo_url;
    }

    public function saveAuthor()
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'name' => ['required'],
            'photo' => ['nullable', 'mimes:jpeg,jpg,png,gif'],
        ];

        $this->validate($rules);

        $this->author->update([
            'name'              => $this->name,
            'slug'              => $this->slug ? $this->slug : slugify($this->name),
            'bio'               => $this->bio,
            'short_bio'         => $this->short_bio,
            'meta_title'        => $this->meta_title,
            'meta_description'  => $this->meta_description,
        ]);

        if ($this->photo) {
            $extension = $this->photo->getClientOriginalExtension();
            $filename = $this->author->hashid . "." . $extension;
            $this->photo->storeAs("public/authors" , $filename);

            $this->author->update([
                'photo' => $filename,
            ]);
        }

        session()->flash('status', 'success');
        session()->flash('message', 'Author "' . $this->name . '" updated');

        return redirect()->route('intranet.blog.author.index');
    }

    public function deleteAuthor()
    {
        $this->author->delete();

        session()->flash('status', 'success');
        session()->flash('message', __('The author has been deleted'));

        return redirect()->route('intranet.blog.author.index');
    }

    public function render()
    {
        return view('livewire.blog.author.edit');
    }
}
