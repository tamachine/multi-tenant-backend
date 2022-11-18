<?php

namespace App\Http\Livewire\Admin\Car;

use App\Models\Car;
use Livewire\Component;

class Translations extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\Car
     */
    public $car;

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

    public function mount(Car $car)
    {
        $this->car = $car;

        // Names
        foreach(config('languages') as $key => $language) {
            $this->names[$key] = $this->car->getTranslation('name', $key);
        }

        // Descriptions
        foreach(config('languages') as $key => $language) {
            $this->descriptions[$key] = $this->car->getTranslation('description', $key);
        }
    }

    public function saveTranslations()
    {
        foreach(config('languages') as $key => $language) {
            $this->car
                ->setTranslation('name', $key, $this->names[$key])
                ->setTranslation('description', $key, $this->descriptions[$key])
                ->save();
        }

        session()->flash('status', 'success');
        session()->flash('message', 'Translations saved successfully');

        return redirect()->route('car.edit', ["car" => $this->car->hashid, "tab" => "translations"]);
    }

    public function render()
    {
        return view('livewire.admin.car.translations');
    }
}