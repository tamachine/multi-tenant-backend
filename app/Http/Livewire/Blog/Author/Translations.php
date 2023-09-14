<?php

namespace App\Http\Livewire\Blog\Author;

use App\Models\BlogAuthor;
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
     * @var App\Models\BlogAuthor
     */
    public $author;

    /**
     * @var array
     */
    public $bios;

    /**
     * @var array
     */
    public $short_bios;   

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(BlogAuthor $author)
    {
        $this->author = $author;

        // bios
        foreach(Language::availableLanguages() as $key => $language) {
            $this->bios[$key] = $this->author->getTranslation('bio', $key);
        }

        // short bios
        foreach(Language::availableLanguages() as $key => $language) {
            $this->short_bios[$key] = $this->author->getTranslation('short_bio', $key);
        }        
    }

    public function saveTranslations()
    {       
        foreach(Language::availableLanguages() as $key => $language) {
            $this->author
                ->setTranslation('bio', $key, $this->bios[$key])
                ->setTranslation('short_bio', $key, $this->short_bios[$key])                
                ->save();
        }

        $this->dispatchBrowserEvent('open-success', ['message' => 'The translations have been saved']);
    }

    public function render()
    {
        return view('livewire.blog.author.translations');
    }
}
