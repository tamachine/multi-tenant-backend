<?php

namespace App\Http\Livewire\Common;

/**
 * This component uploads a featured image or a featured image hover in a model. The model MUST use the HasFeaturedImageHover trait
 */
class FeaturedImageHoverUpload extends FeaturedImageUpload
{       
    protected $deleteImageListener = 'deleteFeaturedImageHover';    

      /**
      * Uploads the featured image hover
      */
    protected function uploadImage()
    {
        $this->model->uploadFeaturedImageHover($this->image, $this->imageName());   
    }   

    /**
     * Deletes the featured image hover
     */
    protected function deleteFeaturedImage()
    {
        $this->model->deleteFeaturedImageHover();
    }

    /**
     * Sets the ImageModel corresponding to the featured image hover
     */
    protected function setModelImage() {        
        if($this->model->getFeaturedImageHoverAttributeValue()) {
            $this->modelImage = $this->model->getFeaturedImagaHoverModelImageInstance();
        }        
    }      
}
