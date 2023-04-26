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
     *  The model MUST use the HasUploadImages trait
     * @var object
     */
    public $model; 

    protected $listeners = [
        'imageUploaded' => 'refreshGallery',
        'imageDeleted'  => 'refreshGallery',
        'deleteGalleryImage' => 'deleteImage',        
    ];

    public function deleteImage($id)
    {                
        $this->model->deleteImage($id);    
        
        $this->setImages();               
    }

    public function refreshGallery() {        
        $this->setImages();
    }

    public function mount() {
        $this->setImages();
    }

    public function render()
    {
        return view('livewire.common.image-gallery');
    }

    /**
     * set images (no webp and no featured ones)
     */
    protected function setImages() {
        $this->images = [];

        $this->images = $this->model->getImages();                
    }
}
