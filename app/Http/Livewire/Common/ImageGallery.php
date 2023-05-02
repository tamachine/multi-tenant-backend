<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;

/**
 * This component shows a gallery for all the images of a model
 */
class ImageGallery extends Component
{

    /** The image
     * @var array
     */
    public $images = [];

    /** Model where the image have to be shown from. 
     *  The model MUST use the HasUploadImages trait
     * @var object
     */
    public $model; 

    /** If true, it will hide the manage alts buttons in Image Card component
     * @var boolean
     */
    public $hiddeImageCardAlts = false;

    protected $listeners = [
        'imageUploaded' => 'refreshGallery',
        'imageDeleted'  => 'refreshGallery',
        'deleteGalleryImage' => 'deleteImage',        
    ];

    /**
     * Deletes an image from the gallery. Removes it from storage and database
     */
    public function deleteImage($id)
    {                
        $this->model->deleteUploadedImage($id);    
        
        $this->setImages();               
    }

    /**
     * Refreshes the gallery
     */
    public function refreshGallery() {        
        $this->setImages();
    }

    /**
     * set images (no webp and no featured ones)
     */
    protected function setImages() {
        $this->images = [];

        $this->images = $this->model->images()->get();                
    }

    public function mount() {       
        $this->setImages();
    }

    public function render()
    {
        return view('livewire.common.image-gallery');
    }

    
}
