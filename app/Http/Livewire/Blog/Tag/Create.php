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
        ];

        $this->validate($rules);

        $tag = $tag->create([
            'name'              => $this->name,
            'slug'              => slugify($this->name),
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Tag "' . $this->name . '" created');

        return redirect()->route('blog.tag.edit', $tag->hashid);
    }

    public function render()
    {
        return view('livewire.blog.tag.create');
    }
}
