<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use App\Models\Car;
use App\Models\Extra;

class Extras extends Component
{
    public $car;
    public $extras;
    public $showMoreButton;
    public $extraPopup;
    
    protected $take = 4;

    public function mount(Car $car) {        
        $this->car = $car;
        $this->extras = $this->car->extras->take($this->take);
        $this->setShowMoreButton();     
        $this->extraPopup = $this->extras->first();        
    }

    public function render()
    {
        return view('livewire.web.extras');
    }

    public function more()
    {                
        $this->extras = $this->car->extras;
        $this->setShowMoreButton();
    }      

    public function info(Extra $extra)
    {
        $this->extraPopup = $extra;
    }
    
    protected function setShowMoreButton()
    {
        $this->showMoreButton = ($this->extras->count() < $this->car->extras->count());
    }
}
