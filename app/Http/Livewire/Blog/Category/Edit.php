<?php

namespace App\Http\Livewire\Blog\Category;

use App\Models\BlogCategory;
use Livewire\Component;

class Edit extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\BlogCategory
     */
    public $category;

    /**
     * @var string
     */
    public $name;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(BlogCategory $category)
    {
        $this->category = $category;
        $this->name = $category->name;
    }

    public function saveCategory()
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'name' => ['required'],
        ];

        $this->validate($rules);

        $this->category->update([
            'name'              => $this->name,
            'slug'              => slugify($this->name),
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Category "' . $this->name . '" updated');

        return redirect()->route('blog.category.index');
    }

    public function deleteCategory()
    {
        $this->category->delete();

        session()->flash('status', 'success');
        session()->flash('message', __('The category has been deleted'));

        return redirect()->route('blog.category.index');
    }

    public function render()
    {
        return view('livewire.blog.category.edit');
    }
}
