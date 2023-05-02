<?php

namespace App\Traits;

use App\Models\ModelImage;

/**
 * This trait manages images in database. Use it in your model in order to save images in database.
 * This trait does not upload the images, to do that use HasUploadImages trait.
 */
trait HasImages
{           
    /**
     * returns all the images of a model exept the ones related with featured_image and featured_image_hover
     * 
     * @var boolean $includeFeaturedImage  True if featured_image has to be included
     * @var boolean $includeFeaturedImageHover True if featured_image_hover has to be included
     */
    public function images($includeFeaturedImage  = false, $includeFeaturedImageHover = false) {        
        $allImages = $this->hasMany(ModelImage::class, 'instance_id', 'id');    
        
        if(in_array('App\Traits\HasFeaturedImage', class_uses($this)) && !$includeFeaturedImage) {
            $attribute = $this->getFeaturedImageAttributeName();
            $allImages = $allImages->where('id', '!=', $this->$attribute);
        }

        if(in_array('App\Traits\HasFeaturedImageHover', class_uses($this)) && !$includeFeaturedImageHover) {
            $attribute = $this->getFeaturedImageHoverAttributeName();
            $allImages = $allImages->where('id', '!=', $this->$attribute);
        }

        return $allImages;
    }         
     
    /**
     * Adds an image to the model
     * @return int Returns the ModelImage id that was created
     */
    public function addImage($path, $alt) {
        $modelImage = ModelImage::updateOrCreate(
            [
                'image_path' => $path
            ],
            [                              
                'alt' => $alt, 
                'model' => $this->getModelName(),     
                'instance_id' => $this->id,            
            ]
        );

        return $modelImage->id;
    }    

    public function changeModelImageFileName($path, $newFileName) {
        $modelImage = ModelImage::findByPath($path);
        $modelImage->changeFileName($newFileName);
    }
    
    /**
     * Delete an image from the model
     * 
     * @var int $id Column id of the image
     * @return string Path that the deleted image had
     */
    protected function deleteImage($id) {
        $modelImage = ModelImage::find($id);
        $path = $modelImage?->image_path;

        $modelImage?->delete();

        return $path;
    }

    /**
     * Returns the class name
     * @return string
     */
    protected function getModelName() {
        return get_class($this);
    }
}