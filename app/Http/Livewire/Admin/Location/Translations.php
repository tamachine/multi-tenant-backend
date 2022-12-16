<?php

namespace App\Http\Livewire\Admin\Location;

use App\Models\Location;
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
     * @var App\Models\Location
     */
    public $location;

    /**
     * @var array
     */
    public $names;

    /**
     * @var array
     */
    public $pickup_input_infos;

     /**
     * @var array
     */
    public $dropoff_input_infos;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Location $location)
    {
        $this->location = $location;

        // Names
        foreach(Language::availableLanguages() as $key => $language) {
            $this->names[$key] = $this->location->getTranslation('name', $key);
        }

        // Pickup Input notes
        foreach(Language::availableLanguages() as $key => $language) {
            $this->pickup_input_infos[$key] = $this->location->getTranslation('pickup_input_info', $key);
        }

        // Dropoff Input notes
        foreach(Language::availableLanguages() as $key => $language) {
            $this->dropoff_input_infos[$key] = $this->location->getTranslation('dropoff_input_info', $key);
        }
    }

    public function saveTranslations()
    {
        foreach(Language::availableLanguages() as $key => $language) {
            $this->location
                ->setTranslation('name', $key, $this->names[$key])
                ->setTranslation('pickup_input_info', $key, $this->pickup_input_infos[$key])
                ->setTranslation('dropoff_input_info', $key, $this->dropoff_input_infos[$key])
                ->save();
        }

        $this->dispatchBrowserEvent('open-success', ['message' => 'The translations have been saved']);
    }

    public function render()
    {
        return view('livewire.admin.location.translations');
    }
}
