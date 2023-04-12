<?php

namespace App\Http\Livewire\Blog\Category;

use App\Models\BlogCategory;
use Livewire\Component;
use App\Helpers\Language;

class Translations extends Component
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
     * @var array
     */
    public $names;

    /**
     * @var array
     */
    public $slugs;


    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(BlogCategory $category)
    {
        $this->category = $category;

        // Names
        foreach(Language::availableLanguages() as $key => $language) {
            $this->names[$key] = $this->category->getTranslation('name', $key);
        }

        // Slugs
        foreach(Language::availableLanguages() as $key => $language) {
            $this->slugs[$key] = $this->category->getTranslation('slug', $key);
        }
    }

    public function saveTranslations()
    {
        foreach(Language::availableLanguages() as $key => $language) {
            $this->category
                ->setTranslation('name', $key, $this->names[$key])
                ->setTranslation('slug', $key, $this->slugs[$key])
                ->save();
        }

        $this->dispatchBrowserEvent('open-success', ['message' => 'The translations have been saved']);
    }

    public function render()
    {
        return view('livewire.blog.category.translations');
    }
}
