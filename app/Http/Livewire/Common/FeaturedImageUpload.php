<?php

namespace App\Http\Livewire\Common;

/**
 * This component uploads a featured image in a model. The model MUST use the HasFeaturedImages trait
 */
class FeaturedImageUpload extends ImageUpload
{    
    public function save()
    {       
        $this->model->uploadFeaturedImageDefault($this->image);         
    }  
}
