<?php

namespace App\Http\Livewire\Blog\Category;

use App\Models\BlogCategory;
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

    public function saveCategory(BlogCategory $category)
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'name'  => ['required'],
        ];

        $this->validate($rules);

        $category = $category->create([
            'name'              => $this->name,
            'slug'              => slugify($this->name),
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Category "' . $this->name . '" created');

        return redirect()->route('blog.category.edit', $category->hashid);
    }

    public function render()
    {
        return view('livewire.blog.category.create');
    }
}
