<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;

class ImageGallery extends Component
{

    /** The image
     * @var array
     */
    public $images = [];

    /** Model where the image have to be uploaded. 
     *  The model MUST use the HasImages trait
     * @var object
     */
    public $model; 

    protected $listeners = [
        'imageUploaded' => 'refreshGallery',
        'imageDeleted'  => 'refreshGallery'
    ];

    public function deleteImage($key)
    {        
        if(isset($this->images[$key])) {
            $this->model->deleteImage($this->images[$key]);    
           
            unset($this->images[$key]);        
        }
    }

    public function refreshGallery() {
        $this->images = $this->model->getImages();
    }

    public function mount() {
        $this->images = $this->model->getImages();
    }

    public function render()
    {
        return view('livewire.common.image-gallery');
    }
}
