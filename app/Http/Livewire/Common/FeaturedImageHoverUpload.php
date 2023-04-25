<?php

namespace App\Http\Livewire\Common;

/**
 * This component uploads a featured image or a featured image hover in a model. The model MUST use the HasFeaturedImages trait
 */
class FeaturedImageHoverUpload extends FeaturedImageUpload
{       
    public function uploadImage()
    {
        $this->model->uploadFeaturedImageHover($this->image);   
    }
    
    protected function deleteFeaturedImage()
    {
        $this->model->deleteFeaturedImageHover();
    }

    protected function setFeaturedImageUrl() {
        $this->featured_image_url = $this->model->featured_image_hover_url;
    }   
}
