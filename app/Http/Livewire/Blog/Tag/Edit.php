<?php

namespace App\Http\Livewire\Blog\Tag;

use App\Models\BlogTag;
use Livewire\Component;

class Edit extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\BlogTag
     */
    public $tag;

    /**
     * @var string
     */
    public $name;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(BlogTag $tag)
    {
        $this->tag = $tag;
        $this->name = $tag->name;
    }

    public function saveTag()
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'name' => ['required'],
        ];

        $this->validate($rules);

        $this->tag->update([
            'name'              => $this->name,
            'slug'              => slugify($this->name),
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Tag "' . $this->name . '" updated');

        return redirect()->route('blog.tag.index');
    }

    public function deleteTag()
    {
        $this->tag->delete();

        session()->flash('status', 'success');
        session()->flash('message', __('The tag has been deleted'));

        return redirect()->route('blog.tag.index');
    }

    public function render()
    {
        return view('livewire.blog.tag.edit');
    }
}
