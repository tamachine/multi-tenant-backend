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

    protected function hasMoreThanOneImage() {
        return count($this->car->images) > 1;
    }    

    protected function hasImages() {
        return count($this->car->images) > 0;
    }    

    protected function firstNoMainImage() {
        return $this->car->images()?->where('main', 0)->first();
    }

    protected function hasHover() {
        return ($this->secondaryImage != null);
    }   

    protected function setImages() {
        if($this->car->mainImage()) {
            $this->mainImage = $this->car->mainImage()->assetPath();
            if($this->hasMoreThanOneImage()) {
                $this->secondaryImage = $this->firstNoMainImage()->assetPath();
            }
        } elseif ($this->hasImages()){
            $this->mainImage = $this->car->images->first()->assetPath();
            if($this->hasMoreThanOneImage()) {
                $this->secondaryImage = $this->car->images->take(1)->first()->assetPath();
            }
        } else {
            $this->mainImage = asset('images/cars/default-car.svg');
        }
    }    
}
