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

    /**
     * @var string
     */
    public $slug;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(BlogTag $tag)
    {
        $this->tag = $tag;
        $this->name = $tag->name;
        $this->slug = $tag->slug;
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
            'slug'              => $this->slug ? $this->slug : slugify($this->name),
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Tag "' . $this->name . '" updated');

        return redirect()->route('intranet.blog.tag.index');
    }

    public function deleteTag()
    {
        $this->tag->delete();

        session()->flash('status', 'success');
        session()->flash('message', __('The tag has been deleted'));

        return redirect()->route('intranet.blog.tag.index');
    }

    public function render()
    {
        return view('livewire.blog.tag.edit');
    }
}
