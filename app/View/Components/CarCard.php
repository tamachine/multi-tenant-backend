<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Models\Car;

class CarCard extends Component
{
    public $car;

    protected $mainImage;
    protected $secondaryImage;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Car $car)
    {
        $this->car = $car;

        $this->setImages();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view(
            'components.car-card',
            [
                'hasHover' => $this->hasHover(),
                'mainImage' => $this->mainImage,
                'secondaryImage' => $this->secondaryImage,
                'noImages' => !$this->hasImages(),                
            ]
        );
    }       

    protected function hasImages() {
        return ($this->mainImage != null);
    }    

    protected function hasHover() {
        return ($this->secondaryImage != null);
    }   

    protected function setImages() {
        if($this->car->featured_image) {
            $this->mainImage = $this->car->featured_image_url;

            if($this->car->featured_image_hover) {
                $this->secondaryImage = $this->car->featured_image_hover_url;    
            }
        } else {
            $this->mainImage = asset('images/cars/default-car.svg');
        }
    }    
}
