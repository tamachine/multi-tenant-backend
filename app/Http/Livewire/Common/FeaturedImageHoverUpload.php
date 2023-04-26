<?php

namespace App\Http\Livewire\Common;

/**
 * This component uploads a featured image or a featured image hover in a model. The model MUST use the HasFeaturedImages trait
 */
class FeaturedImageHoverUpload extends FeaturedImageUpload
{       
    protected $listeners = [
        'deleteFeaturedImageHover' => 'deleteImage',        
    ];

    public function uploadImage()
    {
        $this->model->uploadFeaturedImageHover($this->image);   
    }
    
    protected function getDeleteListener() {
        return 'deleteFeaturedImageHover';
    }

    protected function deleteFeaturedImage()
    {
        $this->model->deleteFeaturedImageHover();
    }

    protected function setFeaturedImagePath() {        
        if($this->model->featured_image_hover_path) {
            $this->modelImage = $this->model->getImageModelInstance($this->model->featured_image_hover_path);
        }        
    }   
}
