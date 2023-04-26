<?php

namespace App\Traits;

use App\Models\ModelImage;
/**
 * This trait manage images in database
 */
trait HasModelImages
{           
    public function getImages() {
        $allImages = ModelImage::where('model', $this->getModelName())->where('instance_hashid', $this->hashid);       
        
        if(in_array('App\Traits\HasFeaturedImage', class_uses($this))) {
            $attribute = $this->featuredImageDefaultAttribute();
            $allImages = $allImages->where('id', '!=', $this->$attribute);
        }

        if(in_array('App\Traits\HasFeaturedImageHover', class_uses($this))) {
            $attribute = $this->featuredImageHoverAttribute();
            $allImages = $allImages->where('id', '!=', $this->$attribute);
        }

        return $allImages->get();
    }         
     
    public function storeImageInDatabase($path, $alt) {
        $modelImage = ModelImage::updateOrCreate(
            [
                'image_path' => $path
            ],
            [                              
                'alt' => $alt, 
                'model' => $this->getModelName(),     
                'instance_hashid' => $this->hashid,            
            ]
        );

        return $modelImage->id;
    }    
    
    protected function deleteFromDatabase($id) {
        $modelImage = ModelImage::find($id);
        $path = $modelImage?->image_path;

        $modelImage?->delete();

        return $path;
    }

    protected function getModelName() {
        return get_class($this);
    }
}