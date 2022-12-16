<?php

namespace App\Http\Livewire\Admin\Extra;

use App\Models\Extra;
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
     * @var App\Models\Extra
     */
    public $extra;

    /**
     * @var array
     */
    public $names;

    /**
     * @var array
     */
    public $descriptions;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Extra $extra)
    {
        $this->extra = $extra;

        // Names
        foreach(Language::availableLanguages() as $key => $language) {
            $this->names[$key] = $this->extra->getTranslation('name', $key);
        }

        // Descriptions
        foreach(Language::availableLanguages() as $key => $language) {
            $this->descriptions[$key] = $this->extra->getTranslation('description', $key);
        }
    }

    public function saveTranslations()
    {
        foreach(Language::availableLanguages() as $key => $language) {
            $this->extra
                ->setTranslation('name', $key, $this->names[$key])
                ->setTranslation('description', $key, $this->descriptions[$key])
                ->save();
        }

        $this->dispatchBrowserEvent('open-success', ['message' => 'The translations have been saved']);
    }

    public function render()
    {
        return view('livewire.admin.extra.translations');
    }
}
