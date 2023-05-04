<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Models\Car;

class CarCard extends Component
{
    public $car;

    protected $mainImage;
    protected $secondaryImage;
    protected $mainImageModelImage = null;    
    protected $mainImagePath = null;    

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
                'mainImageModelImage' => $this->mainImageModelImage,
                'mainImagePath' => $this->mainImagePath,
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
            $this->mainImage = $this->car->getFeaturedImageModelImageInstance(); 
            $this->mainImageModelImage = $this->mainImage;

            if($this->car->featured_image_hover) {
                $this->secondaryImage = $this->car->getFeaturedImagaHoverModelImageInstance(); 
            }
        } else {
            $this->mainImage = 'images/cars/default-car.svg';
            $this->mainImagePath = $this->mainImage;
        }
    }    
}
