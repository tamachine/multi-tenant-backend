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
    }

    public function saveAuthor()
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'name' => ['required'],  
            'slug' => ['alpha_dash',
                        "unique:blog_authors,slug,{$this->author->id}"],          
        ];

        $this->validate($rules);

        $this->author->update([
            'name'              => $this->name,
            'slug'              => $this->slug ? $this->slug : slugify($this->name),
            'bio'               => $this->bio,
            'short_bio'         => $this->short_bio,            
        ]);       

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
