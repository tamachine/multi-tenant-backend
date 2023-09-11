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

    public function saveCategory(BlogCategory $category)
    {
        $this->dispatchBrowserEvent('validationError');

       $rules = [
        'name'  => ['required'],
        'slug'  => ['unique_translation:blog_categories','alpha_dash',]
        // 'slug' => 'unique:blog_categories,en->slug',
        ];

        $this->validate($rules);

        $category = $category->create([
            'name'              => $this->name,
            'slug'              => $this->slug ? $this->slug : slugify($this->name),
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Category "' . $this->name . '" created');

        return redirect()->route('intranet.blog.category.edit', $category->hashid);
    }

    public function render()
    {
        return view('livewire.blog.category.create');
    }
}
