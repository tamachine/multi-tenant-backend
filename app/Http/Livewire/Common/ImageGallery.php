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
        'imageDeleted'  => 'refreshGallery',
        'deleteGalleryImage' => 'deleteImage',        
    ];

    public function deleteImage($key)
    {        
        if(isset($this->images[$key])) {
            $this->model->deleteImage($this->images[$key]);    
           
            unset($this->images[$key]);        
        }
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

        $images = $this->model->getImages();        

        $usesFeaturedImage = $this->modelUsesHasFeaturedImage();
        $usesFeaturedImageHover = $this->modelUsesHasFeaturedImageHover();

        foreach($images as $image) {
            if(($usesFeaturedImage && $image != $this->model->featured_image_path) && ($usesFeaturedImageHover && $image != $this->model->featured_image_hover_path)) {
                $this->images[] = $this->model->getImageModelInstance($image);
            }            
        }
    }

    protected function modelUsesHasFeaturedImage() {
        return in_array('App\Traits\HasFeaturedImage', class_uses($this->model));
    }

    protected function modelUsesHasFeaturedImageHover() {
        return in_array('App\Traits\HasFeaturedImageHover', class_uses($this->model));
    }
}
