<?php

namespace App\Http\Livewire\Blog\Tag;

use App\Models\BlogTag;
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
    public $name;

    /**
     * @var string
     */
    public $slug;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        //
    }

    public function saveTag(BlogTag $tag)
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'name'  => ['required'],
            'slug'  => ['unique:blog_tags,slug','alpha_dash'],
        ];

        $this->validate($rules);

        $tag = $tag->create([
            'name'              => $this->name,
            'slug'              => $this->slug ? $this->slug : slugify($this->name),
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Tag "' . $this->name . '" created');

        return redirect()->route('intranet.blog.tag.edit', $tag->hashid);
    }

    public function render()
    {
        return view('livewire.blog.tag.create');
    }
}
