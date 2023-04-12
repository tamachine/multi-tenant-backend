<?php

namespace App\Http\Livewire\Blog\Post;

use App\Models\BlogPost;
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
     * @var App\Models\BlogPost
     */
    public $post;

    /**
     * @var array
     */
    public $titles;

    /**
     * @var array
     */
    public $slugs;

    /**
     * @var array
     */
    public $summaries;

    /**
     * @var array
     */
    public $contents;


    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(BlogPost $post)
    {
        $this->post = $post;

        // Titles
        foreach(Language::availableLanguages() as $key => $language) {
            $this->titles[$key] = $this->post->getTranslation('title', $key);
        }

        // Slugs
        foreach(Language::availableLanguages() as $key => $language) {
            $this->slugs[$key] = $this->post->getTranslation('slug', $key);
        }

        // Summaries
        foreach(Language::availableLanguages() as $key => $language) {
            $this->summaries[$key] = $this->post->getTranslation('summary', $key);
        }

        // Contents
        foreach(Language::availableLanguages() as $key => $language) {
            $this->contents[$key] = $this->post->getTranslation('content', $key);
        }
    }

    public function saveTranslations()
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'summaries.*' => ['max:1023'],
        ];

        $this->validate($rules);


        foreach(Language::availableLanguages() as $key => $language) {
            $this->post
                ->setTranslation('title', $key, $this->titles[$key])
                ->setTranslation('slug', $key, $this->slugs[$key])
                ->setTranslation('summary', $key, $this->summaries[$key])
                ->setTranslation('content', $key, $this->contents[$key])
                ->save();
        }

        $this->dispatchBrowserEvent('open-success', ['message' => 'The translations have been saved']);
    }

    public function render()
    {
        return view('livewire.blog.post.translations');
    }
}
